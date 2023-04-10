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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register','API\register@index');
Route::post('/login','API\login@index');
Route::post('/forgetPassword','API\forgetPassword@index');
Route::post('/home','API\home@index');

Route::post('/appSetting','API\home@appSetting');


Route::post('/getPackage','API\getPackage@index');
Route::post('/getHotels','API\getHotels@index');
Route::post('/getFlights','API\getFlights@index');


Route::post('/updateProfile','API\updateProfile@index');


Route::post('/bookHotel','API\bookHotel@index');
Route::post('/bookEvisa','API\bookEvisa@index');
Route::post('/bookFlight','API\bookFlight@index');
Route::post('/bookPackage','API\bookPackage@index');

Route::post('/getBookingFlights','API\getBookingFlights@index');
Route::post('/getBookingHotels','API\getBookingHotels@index');
Route::post('/getBookingPackage','API\getBookingPackage@index');
Route::post('/getBookingEvisa','API\getBookingEvisa@index');


Route::post('/submitRate','API\submitRate@index');
Route::post('/getAmenities','API\getAmenities@index');


Route::post('/contactUS','API\contactUS@index');
Route::post('/getFaq','API\getFaq@index');


Route::get('/switchStatus',function(){
    return response()->json(['status'=>1]);
});



