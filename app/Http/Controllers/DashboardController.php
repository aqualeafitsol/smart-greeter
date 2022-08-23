<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ShippingAdress;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Sticker;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            $orders = Order::with('sticker')->where('payment_status','COMPLETED')->where('user_id',Auth()->user()->id)->orderBy('id', 'DESC')->get();
            return view('dashboard',compact('orders'));
        }
        return redirect()->route('login')->with('error','Opps! You do not have access');
    }

   public function analyticsBasic(){
        return view('analytics.basic');
   }
}
