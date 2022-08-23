<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\SubscriptionPlan;
use App\Models\Sticker;
use App\Models\ShippingAdress;

class ProfileController extends Controller
{
     //profile show
     public function profileShow(){
        $user = Auth::user();
        $nameArr = explode(' ',$user->name);
        $first_name = trim($nameArr[0]);
        @$last_name = trim(@$nameArr[1]);
        $orders = Order::where('user_id',Auth::user()->id)->where('payment_status','COMPLETED')->get();
        $plans = SubscriptionPlan::all();
        return view('profileEdit',compact('user','first_name','last_name','orders','plans'));
    }
    //update profile
    public function profileUpdate(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        if($request->password){
            $request->validate([
                'password' => 'required|confirmed|min:6',
                'old_password' =>'required'
            ]);

            $check_password = Hash::check( $request->old_password, Auth::user()->password );
            if($check_password){
                User::where('id',Auth::user()->id)->update([                 
                    'password' => Hash::make($request->password),
                ]);
            }
        }

        User::where('id',Auth::user()->id)->update([
            'name' => $request->first_name .' '. $request->last_name,
            'email' => $request->email,
        ]);

        if($request->has('profile_image')) {
            $getImage  = $request->file('profile_image');
                $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
                $getImage ->move(public_path('/image/profile_image'), $filename);
                user::where('id',Auth::user()->id)->update([
                    'profile_image' => $filename
                ]);
        }
        return redirect()->route('user.profile.edit')->with('success','Profile Update Successfully');
    }

    public function updateAddress(Request $request){
        //dd($request->all());die;
        $input = $request->except('id','_token');
        ShippingAdress::where('id',$request->id)->where('user_id',Auth::user()->id)->update($input);
        return redirect()->route('user.profile.edit')->with('success','Address Update Successfully');
    }
   
}
