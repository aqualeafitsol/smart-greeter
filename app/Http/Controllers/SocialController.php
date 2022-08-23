<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                if(Session::has('url_back')){
                    return Redirect::to(Session::get('url_back'));
                }
                return redirect('/dashboard');
            }else{
                $checkEmail = User::where('email',$user->email)->first();
                if($checkEmail){
                    return redirect()->route('login')->with('error','Email Address already exists');
                }
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'oauth_type' =>'facebook',
                    'is_email_verified' => 1,
                    'user_type' => 2,
                    'password' => encrypt('admin11@123')
                ]);
    
                Auth::login($createUser);
                if(Session::has('url_back')){
                    return Redirect::to(Session::get('url_back'));
                }
                return redirect('/dashboard');
            }
    
        } catch (Exception $exception) {
            return redirect('/login');
            //dd($exception->getMessage());
        }
    }

    public function googleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function loginWithgoogle(){

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
         // only allow people with @company.com to login
        /* if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        } */

        // check if they're an existing user
        try{
            //$existingUser = User::where('email', $user->email)->first();
            $existingUser = User::where('google_id', $user->id)->first();

            if($existingUser){
                Auth::login($existingUser);

                if(Session::has('url_back')){
                    return Redirect::to(Session::get('url_back'));
                }
                return redirect('/dashboard');
            }else{
                $checkEmail = User::where('email',$user->email)->first();
                    if($checkEmail){
                        return redirect()->route('login')->with('error','Email Address already exists');
                    }
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'is_email_verified' => 1,
                        'oauth_type' =>'google',
                        'user_type' => 2,
                        'password' => encrypt('admin11@123')
                    ]);
        
                    Auth::login($createUser);
                    if(Session::has('url_back')){
                        return Redirect::to(Session::get('url_back'));
                    }
                    return redirect('/dashboard');
            }
        }catch(\Exception $e){
            return redirect('/login');
        }
    }

    public function linkedinRedirect(){
        return Socialite::driver('linkedin')->redirect();
    }
    public function loginWithLinkedin(){
       
        try{
            $user = Socialite::driver('linkedin')->user();
        }catch(\Exception $e){
            return redirect('/login');
        }

        try{
            //$existingUser = User::where('email', $user->email)->first();
            $existingUser = User::where('linkedin_id', $user->id)->first();

            if($existingUser){
                Auth::login($existingUser);
                if(Session::has('url_back')){
                    return Redirect::to(Session::get('url_back'));
                }
                return redirect('/dashboard');
            }else{
                $checkEmail = User::where('email',$user->email)->first();
                    if($checkEmail){
                        return redirect()->route('login')->with('error','Email Address already exists');
                    }
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'linkedin_id' => $user->id,
                        'oauth_type' =>'linkedin',
                        'is_email_verified' => 1,
                        'user_type' => 2,
                        'password' => encrypt('admin111@123')
                    ]);
        
                    Auth::login($createUser);
                    if(Session::has('url_back')){
                        return Redirect::to(Session::get('url_back'));
                    }
                    return redirect('/dashboard');
            }
        }catch(\Exception $e){
            return redirect('/login');
        }
        
    }
}
