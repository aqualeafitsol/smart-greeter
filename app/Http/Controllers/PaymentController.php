<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\SubscriptionPlan;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\ShippingAdress;
use App\Models\Setting;
use App\Models\User;
use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
   
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        //dd($request->all());
        
        if(!Auth::user()){

            Session::put('payment',$request->payment);
            Session::put('country',$request->country);
            Session::put('state1',$request->state);
            Session::put('residence_data',$request->residence_data);
            Session::put('post_code',$request->post_code);
            //dd(session()->all());
            return Redirect::back()->with('error_code', 5);
           //return redirect('login');
        }
        Session::forget('url_back');
        Session::forget('payment');
        Session::forget('country');
        Session::forget('state1');
        Session::forget('residence_data');
        Session::forget('post_code');

        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'post_code' => 'required',
        ]);

        $plan_details = SubscriptionPlan::where('id',$request->plan_id)->first();
        $productDetails = Product::where('id',$request->package_id)->first();
        $settings = Setting::where('id',1)->first();

        
        if($plan_details && $productDetails){
            $total_price = ($plan_details->price + ($productDetails->price * $request->qty ));
        }
        $tax = $total_price*$settings->order_tax/100;
        $final_ammount = $total_price + $tax;
        //save to order payment 
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'amount' => $total_price,
            'tax' => $tax,
            'sub_total' => $final_ammount,
            'status' => 1,
            'payment_type' => 'Paypal',
            'payment_status' => 'PENDING',
        ]);

        //Order deatils Save
        $order_details_data = [
            [
                'order_id'=>$order->id,
                'user_id'=> auth()->user()->id,
                'item_type'=>'Plan',
                'item_id'=>$plan_details->id,
                'item_name'=>$plan_details->name,
                'price'=>$plan_details->price,
                'qty'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                
            ],
            [
                'order_id'=>$order->id,
                'user_id'=> auth()->user()->id,
                'item_type'=>'Product',
                'item_id'=>$productDetails->id,
                'item_name'=>$productDetails->name,
                'price'=>$productDetails->price,
                'qty'=>$request->qty,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ];

        OrderDetail::insert($order_details_data);

        //save shipping Address
        ShippingAdress::create([
            'user_id'=> auth()->user()->id,
            'order_id'=>$order->id,
            'country'=>$request->country,
            'state'=>$request->state,
            'residence_data'=>$request->residence_data,
            'post_code'=>$request->post_code,
        ]);
        
        if($request->payment == 'paypal'){
            return  $this->paypalPayment($final_ammount,$order);
        }elseif($request->payment == 'credit_card'){
            //echo "card";die;
        }
       
    }

    public function paypalPayment($final_ammount,$order){
        //dd('sdfds');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($final_ammount,2),
                    ]
                ]
            ]
        ]);

        //echo "<pre>";print_r($response);die;

        if (isset($response['id']) && $response['id'] != null) {

            //order table update trns id    
            Order::where('id', $order->id)
            ->update(['transaction_id'=> $response['id']]);
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('plan.two.post')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
        //return 'success';
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Transaction::create([
                'user_id' => auth()->user()->id,
                'payment_type' => 'Paypal',
                'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'currency' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
                'transation_id' => $response['id'],
                'status' => $response['status'],
            ]);

            //update responce status
            Order::where('transaction_id', $response['id'])
            ->update(['payment_status'=> $response['status']]);

            //Get order details
            $order = order::with('orderDetails')
            ->where('transaction_id',$response['id'])
            ->first();

            //update user plan
            User::where('id', Auth()->user()->id)->update(['active_plan_id' => $order->orderDetails[0]->item_id]); //

            //Send mail to user
            Mail::send('emails.order.receipt', ['order' => $order], function($message) use($request){
                $message->to(Auth()->user()->email);
                $message->subject('Order receipt');
            });

            return view('finishPayment');
            //return redirect()->route('dashboard')->with('success', 'Transaction complete.');
        } else {
            return redirect()
            ->route('plan.two.post')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        Order::where('transaction_id', $request['token'])
        ->update(['payment_status'=> 'CANCEL']);
        return redirect()->route('home')->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
