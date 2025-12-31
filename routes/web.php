<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;


Route::get('/',[Authcontroller::class,'loginadmin']);
Route::post('/loginadmin',[Authcontroller::class,'loginmasuk'])->name('logmasuk.admin');
Route::get('/dashboard', function(){
    return view('pages.dashboard.shopan');
})->name('dashboard.show');
Route::get('/banner', [BannerController::class , 'index'])->name('banner.index');
Route::post('/banner', [BannerController::class , 'storebanner'])->name('banner.upload');
Route::delete('/banner/delete/{banner_id}',[BannerController::class,'deletebanner'])->name('banner.delete');


