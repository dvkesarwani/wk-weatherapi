<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\CacheServiceProvider;

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
 
Route::get('/weather', function () {
         $city = request('city');
         $apiKey = config('services.weatherbit.key');
         $apiUrl = config('services.weatherbit.provider');
         return Http::get("$apiUrl/forecast/daily?city=$city&days=11&key=$apiKey");   
});