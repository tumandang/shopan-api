<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\RequestController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/',[Authcontroller::class,'loginadmin']);
Route::post('/loginadmin',[Authcontroller::class,'loginmasuk'])->name('logmasuk.admin');

//dashboard|home
Route::get('/dashboard', function(){
    return view('pages.dashboard.shopan');
})->name('dashboard.show');

//banner
Route::get('/banner', [BannerController::class , 'index'])->name('banner.index');
Route::post('/banner', [BannerController::class , 'storebanner'])->name('banner.upload');
Route::delete('/banner/delete/{banner_id}',[BannerController::class,'deletebanner'])->name('banner.delete');

//requests
Route::get('/request', [RequestController::class , 'index'])->name('request.index');
Route::put('/request-update', [RequestController::class, 'updateRequest']) ->name('request.update');
Route::put('/request-reject',[RequestController::class,'rejectRequest'])->name('request.reject');
Route::delete('/request/{id}', [RequestController::class, 'deleteRequest'])->name('request.delete');

//stripe




//logout
Route::post('/logout',function(){
    Auth::logout();
    return redirect('/');
})->name('logout.admin');