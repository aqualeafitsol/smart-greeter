<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Plan\SubscriptionPlanController;
use App\Http\Controllers\Admin\Faq\FaqController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Cms\CmsController;
use App\Http\Controllers\Admin\Order\OrderController;

//Frontend
use App\Http\Controllers\AuthenticationController as UserAuthController;
use App\Http\Controllers\DashboardController as UserDashboardController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\StickerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
// Start FrontEnd
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login',[UserAuthController::class,'showLogin'])->name('login');
Route::post('/login',[UserAuthController::class,'doLogin'])->name('user.login');
Route::get('/signup',[UserAuthController::class,'registration'])->name('signup');
Route::post('/signup',[UserAuthController::class,'doRegistration'])->name('user.signup');
Route::get('/account/verify/{token}', [UserAuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('/verify/email',[UserAuthController::class,'showVerifyEmail'])->name('email.verify');
Route::get('/resend/verify-email',[UserAuthController::class,'resendVerifyEmail'])->name('resend.email.verify'); 
//password
Route::get('/forget-password', [UserAuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [UserAuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [UserAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [UserAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
//facebook login
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('facebook.login');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
//google login
Route::get('auth/google',[SocialController::class,'googleRedirect'])->name('google.login');
Route::get('auth/google/callback',[SocialController::class,'loginWithgoogle']);
//linkedin Login
Route::get('auth/linkedin',[SocialController::class,'linkedinRedirect'])->name('linkedin.login');
Route::get('auth/linkedin/callback',[SocialController::class,'loginWithLinkedin']);
//By a package
Route::get('/subscription',[SubscriptionController::class,'getPlanList'])->name('plan.list');    
Route::get('/subscription/{slug}',[SubscriptionController::class,'postCreateSubscription'])->name('plan.one.post');    
Route::get('/final/subscription',[SubscriptionController::class,'postStepTwoSubscription'])->name('plan.two.post'); 
//paypal transaction
Route::get('process-transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
//cms
Route::get('/cms/{slug}',[HomeController::class,'getCmsPage'])->name('cms');
Route::post('/contact-us',[HomeController::class,'contactUs'])->name('contact_us');
//Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth', 'is_verify_email'])->name('dashboard');

Route::get('/download-receipt/{order_id}/{user_id}',[HomeController::class,'downloadReceipt'])->name('download.receipt');

Route::get('/sticker/view/{slug}',[StickerController::class,'view'])->name('user.sticker.view');
Route::middleware(['auth', 'is_verify_email'])->group(function(){
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile/edit',[ProfileController::class,'profileShow'])->name('user.profile.edit');
    Route::post('/profile/update',[ProfileController::class,'profileUpdate'])->name('user.profile.update');

    //sticker
    Route::get('/sticker/add',[StickerController::class,'stickerAdd'])->name('user.sticker.add');
    Route::post('/sticker/add',[StickerController::class,'stickerStore'])->name('user.sticker.save');
    Route::get('/sticker/list',[StickerController::class,'index'])->name('user.sticker.list');
    Route::get('/sticker/edit/{slug}',[StickerController::class,'edit'])->name('user.sticker.edit');
    Route::post('/sticker/update',[StickerController::class,'update'])->name('user.sticker.update');
    Route::get('/sticker/qrcode/view',[StickerController::class,'viewQrcode'])->name('user.sticker.qrcode');
    

    Route::get('/analytics/basic',[UserDashboardController::class,'analyticsBasic'])->name('analytics.basic');
    //update Billing And Shipping Info
    Route::post('/update-address',[ProfileController::class,'updateAddress'])->name('user.address.update');

    Route::get('/logout',[UserAuthController::class,'logout'])->name('logout');

});


// Admin
Route::get('admin/login', [AuthenticationController::class,'ShowLogin'])->name('admin.login');
Route::post('admin/login', [AuthenticationController::class,'DoLogin'])->name('admin.logins');
Route::group(['middleware'=>'is_admin','prefix'=>'admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'Index'])->name('admin');
    Route::get('/logout', [DashboardController::class,'logout'])->name('admin.logout');
    Route::get('/user',[UserController::class,'Index'])->name('admin.user');
    
    //Subscription Plan
    Route::group(['prefix'=>'plan'],function(){
        Route::get('/subscription',[SubscriptionPlanController::class,'index'])->name('admin.plan');
        Route::get('/subscription/add',[SubscriptionPlanController::class,'create'])->name('admin.create.plan');
        Route::post('/subscription',[SubscriptionPlanController::class,'store'])->name('admin.add.plan');
        Route::get('/subscription/edit/{slug}',[SubscriptionPlanController::class,'edit'])->name('admin.edit.plan');
        Route::post('/subscription/edit',[SubscriptionPlanController::class,'update'])->name('admin.update.plan');
        Route::get('/subscription/delete/{slug}',[SubscriptionPlanController::class,'destroy'])->name('admin.delete.plan');
    }); 

     //Faq
     Route::group(['prefix'=>'faq'],function(){
        Route::get('/',[FaqController::class,'index'])->name('admin.faq');
        Route::post('/',[FaqController::class,'store'])->name('admin.faq.add');
        Route::get('/edit/{slug}',[FaqController::class,'edit'])->name('admin.faq.edit');
        Route::post('/edit',[FaqController::class,'update'])->name('admin.faq.update');
        Route::get('/delete/{slug}',[FaqController::class,'destroy'])->name('admin.faq.delete');
    }); 

    //Settings
    Route::group(['prefix'=>'setting'],function(){
        Route::get('/edit/{slug}',[SettingController::class,'edit'])->name('admin.setting.edit');
        Route::post('/edit',[SettingController::class,'update'])->name('admin.setting.update');
    }); 

    //CMS
    Route::group(['prefix'=>'cms'],function(){
        Route::get('/',[CmsController::class,'index'])->name('admin.cms');
        Route::get('/add',[CmsController::class,'create'])->name('admin.create.cms');
        Route::post('/add',[CmsController::class,'store'])->name('admin.store.cms');
        Route::get('/edit/{slug}',[CmsController::class,'edit'])->name('admin.edit.cms');
        Route::post('/edit',[CmsController::class,'update'])->name('admin.update.cms');
        Route::get('/delete/{slug}',[CmsController::class,'destroy'])->name('admin.delete.cms');
    });
    
    //Order 
    Route::group(['prefix'=>'order'],function(){
        //Route::get('/',[OrderController::class,'index'])->name('admin.order');
        Route::get('/',[OrderController::class,'stickerOrder'])->name('admin.sticker.order');
        Route::get('/status/update',[OrderController::class,'stickerOrderStatusUpdate'])->name('admin.order.status.update');
    });

    Route::get('sticker/status/update',[OrderController::class,'stickerStatusUpdate'])->name('admin.sticker.status.update');

});
