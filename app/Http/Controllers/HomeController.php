<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\Product;
use App\Models\Cms;
use App\Models\Faq;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //echo $request->ip();
        //echo $_SERVER['REMOTE_ADDR'];die;
        /* $useragent=$_SERVER['HTTP_USER_AGENT'];
        $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
        $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"Windows ");
        //do something with this information
        if( $iPod || $iPhone ){

            //browser reported as an iPhone/iPod touch -- do something here
        }else if($iPad){
            //browser reported as an iPad -- do something here
        }else if($Android){
            echo "android";
            //browser reported as an Android device -- do something here
        }else if($webOS){
            echo "windows";
            //browser reported as a webOS device -- do something here
        } */

       /*  $order_details= order::with('orderDetails')
        ->where('id',19)
        ->first();

        dd($order_details); */
        
        $plans = SubscriptionPlan::all();
        $faqs = Faq::all();
        $settings = Setting::where('id',1)->first();
        return view('home',compact('plans','faqs','settings'));
    }
    public function getCmsPage($slug){
        $cms = Cms::where('slug',$slug)->first();
        return view('cms',compact('cms'));
    }

    public function contactUs(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $input = $request->except('_token');
        $contactUs = ContactUs::create($input);
        if($contactUs){
            return response()->json(['success'=>true,'msg'=>'Thank you for getting in touch! ']);
        }
    }

    public function downloadReceipt($en_order_id,$en_user_id){
        //echo "test";die;
        $order_id = Crypt::decryptString($en_order_id);
        $user_id = Crypt::decryptString($en_user_id);
        $order = order::with('orderDetails')
            ->where('id',$order_id)
            ->where('user_id',$user_id)
            ->first();
        $data = ['title' => 'Order Receipt','order'=>$order];
        $pdf = PDF::loadView('pdf.receipt', $data);
        return $pdf->download('order-receipt.pdf');

    }
}
