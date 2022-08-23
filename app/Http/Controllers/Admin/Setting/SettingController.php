<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    public function edit(){
        $settings = Setting::where('id',1)->first();
        return view('admin.setting.edit',compact('settings'));
    }
    public function update(Request $request){
        //dd($request->all());
        $request->validate([
            'order_tax' => 'required',
        ]);
        Setting::where('id',$request->id)
            ->update([
                'order_tax'     => $request->order_tax,
                'facebook_link' => $request->facebook_link,
                'twitter_link'  => $request->twitter_link,
                'linkedin_link' => $request->linkedin_link,
                'insta_link'    => $request->insta_link,
                'what_for_you'  => $request->what_for_you,
                'step'          => $request->step,
                'plan'          => $request->plan,
            
            ]);
        return redirect()->route('admin.setting.edit',1);
    }
}
