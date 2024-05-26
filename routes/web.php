<?php

use Illuminate\Support\Facades\Route;

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




// ================== Guest Space Views ===============
Route::get('/', function () { return view('home'); }); 
Route::get('/contact', function () { return view('contact'); }); 
Route::get('/pricing', function () { return view('pricing'); }); 
Route::get('/reclamation', function () { return view('reclamation'); }); 



// ================== Admin Space Views ===============
Route::get('/dashboard', function () { return redirect('/dashboard/expeditions'); }); 
Route::get('/dashboard/expeditions', function () { return view('admin/expeditions'); });
Route::get('/dashboard/expeditions/detail', function () { return view('admin/expedition-detail'); });
Route::get('/dashboard/stats', function () { return view('admin/statistique'); }); 
Route::get('/dashboard/accounts', function () { return view('admin/user-account'); }); 
Route::get('/dashboard/messages', function () { return view('admin/messages'); }); 


// ================== Client User Space Views ===============
Route::get('/signin','App\Http\Controllers\UserController@showSignin')->name('login');
Route::post('/signin','App\Http\Controllers\UserController@signinUser');
Route::get('/signup','App\Http\Controllers\UserController@showSignup')->name('signup');
Route::post('/signup','App\Http\Controllers\UserController@signupUser');

Route::middleware(['auth'])->group(function () {
    Route::get('/userspace/expeditions', 'App\Http\Controllers\ShipController@userspace_expedition' );
    Route::get('/userspace/signout','App\Http\Controllers\UserController@signOutUser');
  
    //========== Route called by js ==============
    Route::post('/userspace/expeditions/details', 'App\Http\Controllers\RestController@getUserShippingDetail');
    Route::post('/userspace/expeditions/new-order','App\Http\Controllers\ShipController@orderShipping');
    Route::post('/userspace/expedition/get-barcode','App\Http\Controllers\ShipController@getShippingBarcodeUrl');
});


// ================ Special Feature Routes: Mail Verification =====================
Route::get('/user/verify-email', function () {return view('services');})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'MailVerificationController@verifyEmail')->middleware('signed')->name('verification.verify');
Route::post('/email/resend', 'MailVerificationController@resendVerificationLink')->middleware('throttle:6,1')->name('verification.resend');


// ================== Test Routes: Behaviour and Features =========================
Route::get('/test','App\Http\Controllers\TestController@welcome')->name('home');
Route::get('/newalert/bymail','App\Http\Controllers\FeatureController@sendmail');
Route::get('/newalert/bysms','App\Http\Controllers\FeatureController@sendsms');
Route::get('/newBarcode','App\Http\Controllers\FeatureController@barcode');


// ================ Old Routes: No more used but still workd =========================
// Route::get('/estimator', function () { return view('estimator'); }); 
// Route::get('/userspace/account', 'App\Http\Controllers\ShipController@userspace_account' ); 
// Route::post('/userspace/account/edit', 'App\Http\Controllers\UserController@updateUserInfo' );
// Route::get('/userspace/estimator', 'App\Http\Controllers\ShipController@userspace_estimator');
// Route::post('/userspace/package-estimator', 'App\Http\Controllers\ShipController@estimateCost');