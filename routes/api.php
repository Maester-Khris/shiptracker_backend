<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('auth:sanctum')->get("/test", 'App\Http\Controllers\RestController@getSomeInfo');


Route::post("/login", 'App\Http\Controllers\AuthController@signinRemoteUser');
Route::middleware('auth:sanctum')->group(function(){
    Route::get("/shippings", 'App\Http\Controllers\RestController@allShippings');
    Route::post("/shipping/exist",'App\Http\Controllers\RestController@checkShippingExist');
    Route::post("/shippings/detail", 'App\Http\Controllers\RestController@getShippingDetail');
    Route::post("/shippings/detail-limited", 'App\Http\Controllers\RestController@getLimitedDetail');

    Route::post("/shippings/add-one", 'App\Http\Controllers\RestController@ShippingNew');
    Route::post("/shipping/update-step", 'App\Http\Controllers\RestController@ShippingNewStep');
    Route::post("/shipping/update-status", 'App\Http\Controllers\RestController@ShippingNewStatus');

    
    Route::post("/shipfolder/saveImage", 'App\Http\Controllers\RestController@uploadImage');
    Route::get("/logout", 'App\Http\Controllers\AuthController@signoutRemoteUser');
});

Route::get("/test", 'App\Http\Controllers\RestController@getSomeInfo');