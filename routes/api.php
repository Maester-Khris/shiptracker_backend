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

Route::post("/login", 'App\Http\Controllers\RestController@connectUser');
Route::get("/logout", 'App\Http\Controllers\RestController@deconnectUser');

Route::post("/user/shippings", 'App\Http\Controllers\RestController@getUserShippings');
Route::post("/user/shippings/detail", 'App\Http\Controllers\RestController@getUserShippingDetail');


// Route::middleware('auth:sanctum')->get("/test", 'App\Http\Controllers\RestController@getSomeInfo');
Route::get("/test", 'App\Http\Controllers\RestController@getSomeInfo');