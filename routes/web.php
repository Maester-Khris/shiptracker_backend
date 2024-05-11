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


// ================== View Loading ===============
Route::get('/', function () { return view('home'); }); 
Route::get('/estimator', function () { return view('estimator'); }); 

Route::middleware(['auth'])->group(function () {
    Route::get('/userspace/account', 'App\Http\Controllers\ShipController@userspace_account' ); 
    Route::post('/userspace/account/edit', 'App\Http\Controllers\UserController@updateUserInfo' );
    Route::get('/userspace/expeditions', 'App\Http\Controllers\ShipController@userspace_expedition' );
    Route::get('/userspace/estimator', 'App\Http\Controllers\ShipController@userspace_estimator');

    // Route called by js
    
    Route::post('/userspace/expeditions/details', 'App\Http\Controllers\RestController@getUserShippingDetail');
    Route::post('/userspace/expeditions/new-order','App\Http\Controllers\ShipController@orderShipping');

    Route::post('/userspace/package-estimator', 'App\Http\Controllers\ShipController@estimateCost');
    Route::post('/userspace/expedition/get-barcode','App\Http\Controllers\ShipController@getShippingBarcodeUrl');
});


// ========================= Auth =========================
Route::get('/signin','App\Http\Controllers\UserController@showSignin')->name('login');
Route::post('/signin','App\Http\Controllers\UserController@signinUser');
Route::get('/signup','App\Http\Controllers\UserController@showSignup')->name('signup');
Route::post('/signup','App\Http\Controllers\UserController@signupUser');
Route::get('/userspace/signout','App\Http\Controllers\UserController@signOutUser');


// ========================= MAIL Verification ============
Route::get('/user/verify-email', function () {
    return view('services');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', 'MailVerificationController@verifyEmail')
    ->middleware('signed')->name('verification.verify');
Route::post('/email/resend', 'MailVerificationController@resendVerificationLink')
    ->middleware('throttle:6,1')->name('verification.resend');


// ========================= Features =========================
Route::get('/newalert/bymail','App\Http\Controllers\FeatureController@sendmail');
Route::get('/newalert/bysms','App\Http\Controllers\FeatureController@sendsms');
Route::get('/newBarcode','App\Http\Controllers\FeatureController@barcode');


// ========================= Test =========================
Route::get('/test','App\Http\Controllers\TestController@welcome')->name('home');





// Route::post('/live/test/launch','App\Http\Controllers\ShipController@launchShipping');
// Route::get('/feature/test','App\Http\Controllers\ShipController@launchShipping');
// Route::post('/live/test','App\Http\Controllers\ShipController@markShippingNewPoint');
// Route::get('/live/test','App\Http\Controllers\UserController@signOutUser');

