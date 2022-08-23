<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\SubscriptionPlan;
use App\Models\Sticker;
use App\Models\StickerImage;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StickerController extends Controller
{

    public function index(){
        $stickers = Sticker::where('user_id', Auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('sticker.index',compact('stickers'));
    }
    public function stickerAdd(Request $request){
        $enc_order_id = $request->id;
        $odrer_id = Crypt::decryptString($request->id);
        //echo  $odrer_id;die;
        $sticker = Sticker::where('order_id',$odrer_id)->where('user_id', Auth()->user()->id)->first();
    
        if($sticker){ 
            return view('sticker.edit',compact('sticker'));
        }else{
            return view('sticker.add',compact('enc_order_id'));
        }
        
    }

    public function stickerStore(Request $request){
        //dd($request->all());
        $input = $request->except('order_id','profile_image','cover_image','images');
        $uniqueid = uniqid();
        $input['unique_id'] = $uniqueid;
        $input['user_id'] = Auth()->user()->id;
        $input['order_id'] = Crypt::decryptString($request->order_id);

        $profile_image = 'NULL';
        if($request->has('profile_image')) {
            $getImage  = $request->file('profile_image');
                $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
                $getImage ->move(public_path('/sticker/profile-image'), $filename);
                $profile_image = $filename;
                /* user::where('id',Auth::user()->id)->update([
                    'profile_image' => $filename
                ]); */
        }
        $cover_image = 'NULL';
        if($request->has('cover_image')) {
            $getImage  = $request->file('cover_image');
                $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
                $getImage ->move(public_path('/sticker/cover-image'), $filename);
                $cover_image = $filename;
        }

        $input['profile_image'] = $profile_image;
        $input['cover_image'] = $cover_image;
        //$input['image'] = $image;
        $sticker = Sticker::create($input);
        //Multiple image uploade
        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $key => $file)
            {
                $filename = time().uniqid(). '.'.$file->getClientOriginalExtension();
                $file->move(public_path('/sticker/images'), $filename);
                $insert[$key]['image'] = $filename;
                $insert[$key]['sticker_id'] = $sticker->id;
            }

            StickerImage::insert($insert);
         }
         
        //End Multiple image
        $url =  route('user.sticker.view',[$uniqueid]);
        $file_name = $uniqueid.'.svg';
        $qrcode = QrCode::size(300)
        ->format('svg')
        //->backgroundColor(255,55,0)
        ->merge(public_path('image/logo.png'), 0.5, true)
        ->errorCorrection('H')
        ->generate($url, public_path('qrcode/'.$file_name));
          
        Sticker::where('id', $sticker->id)->where('user_id', Auth()->user()->id)
        ->update([
            'qrcode'    =>$file_name,
        ]);

        return redirect()->route('user.sticker.list')->with('success','Sticker add Successfully');
    }

    public function view($unique_id){
        $sticker = Sticker::where('unique_id',$unique_id)->first();
        return view('sticker.sticker',compact('sticker'));

    }

    public function edit($id){
        $sticker = Sticker::where('id',$id)->where('user_id', Auth()->user()->id)->first();
        return view('sticker.edit',compact('sticker'));
        //dd($sticker);
    }
    public function update(Request $request){
       
        //dd($request->all());
        $sticker = Sticker::where('id', Crypt::decryptString($request->id))->where('user_id', Auth()->user()->id)->first();
        Sticker::where('id', Crypt::decryptString($request->id))->where('user_id', Auth()->user()->id)
        ->update([
            'user_id'       => Auth()->user()->id,
            'name'          => $request->name,
            'chk_name'      => $request->has('chk_name') ? $request->chk_name : 'NULL',
            'bio'           => $request->bio,
            'chk_bio'       => $request->has('chk_bio') ? $request->chk_bio : 'NULL',
            'phone'         => $request->phone,
            'chk_phone'     => $request->has('chk_phone') ? $request->chk_phone : 'NULL',
            'email'         => $request->email,
            'chk_email'     => $request->has('chk_email') ? $request->chk_email : 'NULL',
            'address'       => $request->address,
            'chk_address'   => $request->has('chk_address') ? $request->chk_address : 'NULL',
            'chk_social'    => $request->has('chk_social') ? $request->chk_social : 'NULL',
            'fb_link'    => $request->fb_link,
            'linkedin_link'    => $request->linkedin_link,
            'twitter_link'    => $request->twitter_link,
            'insta_link'    => $request->insta_link,
            'g_map_link'    => $request->g_map_link,
            'chk_g_map_link'=> $request->has('chk_g_map_link') ? $request->chk_g_map_link : 'NULL',
            'url'           => $request->url,
            'chk_url'       => $request->has('chk_url') ? $request->chk_url : 'NULL',
            'chk_profile_image'=> $request->has('chk_profile_image') ? $request->chk_profile_image : 'NULL',
            'chk_cover_image'=> $request->has('chk_cover_image') ? $request->chk_cover_image : 'NULL',
        ]);

        if($request->has('profile_image')) {
            $getImage  = $request->file('profile_image');
            $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
            $getImage ->move(public_path('/sticker/profile-image'), $filename);
                Sticker::where('id', Crypt::decryptString($request->id))->where('user_id', Auth()->user()->id)
                    ->update([
                        'profile_image' => $filename
                    ]);
            if($sticker->profile_image){
                unlink(public_path('/sticker/profile-image/'.$sticker->profile_image)); //delete old image 
            }       
        }

        if($request->has('cover_image')) {
            $getImage  = $request->file('cover_image');
            $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
            $getImage ->move(public_path('/sticker/cover-image'), $filename);
            Sticker::where('id', Crypt::decryptString($request->id))->where('user_id', Auth()->user()->id)
                    ->update([
                        'cover_image' => $filename
                    ]);
            if($sticker->cover_image){        
                unlink(public_path('/sticker/cover-image/'.$sticker->cover_image)); //delete old image   
            }     
        }
        

        /* if($request->has('image')) {
            $getImage  = $request->file('image');
            $filename = time().uniqid(). '.'.$getImage->getClientOriginalExtension();
            $getImage ->move(public_path('/sticker/image'), $filename);
            Sticker::where('id', Crypt::decryptString($request->id))->where('user_id', Auth()->user()->id)
                    ->update([
                        'image' => $filename
                    ]);

            unlink(public_path('/sticker/image/'.$sticker->image)); //delete old image        

        } */
        if($request->has('delete_image')) {
            foreach($request->delete_image as $img){
                StickerImage::where('id',$img)->where('sticker_id',Crypt::decryptString($request->id))->delete();
            }
        }
         //Multiple image uploade
         if($request->hasfile('images'))
         {
            //StickerImage::where('sticker_id',Crypt::decryptString($request->id))->delete();
            foreach($request->file('images') as $key => $file)
            {
                $filename = time().uniqid(). '.'.$file->getClientOriginalExtension();
                $file->move(public_path('/sticker/images'), $filename);
                $insert[$key]['image'] = $filename;
                $insert[$key]['sticker_id'] = Crypt::decryptString($request->id);
            }

            StickerImage::insert($insert);
         }
         
        //End Multiple image

        return redirect()->route('user.sticker.list')->with('success','Sticker update Successfully');
    }

    public function viewQrcode(){
        
    }
}
