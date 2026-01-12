<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RequestController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route :: post('register',[Authcontroller :: class ,'register']);
Route :: post('login',[Authcontroller :: class ,'login']);
Route :: get('banner',[BannerController::class,'getAllBanners']);
Route::get('/banner/{id}', [BannerController::class, 'getImage']);
Route :: group(
    [
        "middleware"=>["auth:sanctum"],
    ],function(){
        Route :: get('profile', [Authcontroller::class ,'profile']);
        Route :: post('requestproduct',[RequestController::class , 'RequestAPI']);
        Route :: get('listrequest',[RequestController::class , 'FetchRequest']);
        Route :: get('logout', [Authcontroller::class ,'logout']);
    }
);

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user()->load('customer');
});

Route::middleware('auth:sanctum')->put('profileupdate', [CustomerController::class,'editProfile']);

