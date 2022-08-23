<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Setting;

class SubscriptionController extends Controller
{
    public function getPlanList(){
        $plans = SubscriptionPlan::all();

        return view('subscription',compact('plans'));

    }

    public function postCreateSubscription($id){
        $plan_id = $id;
        return view('productPhysical',compact('plan_id'));
    }

    public function postStepTwoSubscription(Request $request){
        //dd($request->fullUrl());
        $current_url = $request->fullUrl();
        Session::put('url_back',$current_url);
        $plan_id = $request->plan_id;
        $package_id = $request->package_id;
        $qty = $request->qty;
        $plan_details = SubscriptionPlan::where('id',$plan_id)->first();
        $productDetails = Product::where('id',$package_id)->first();
        $settings = Setting::where('id',1)->first();
        if($plan_details && $productDetails){
            $total_price = $plan_details->price + ($productDetails->price * $qty);
            //dd($productDetails);
        }
        $tax = $total_price*$settings->order_tax/100;
        $final_ammount = $total_price + $tax;
        return view('payment',compact('plan_id','package_id','qty','plan_details','productDetails','total_price','final_ammount','tax'));
    }

}
