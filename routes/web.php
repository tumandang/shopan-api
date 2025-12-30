<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.shopan');
});
Route::post('/banner', [BannerController::class , 'storebanner'])->name('banner.upload');
Route::get('/banner', [BannerController::class , 'index'])->name('banner.index');


