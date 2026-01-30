<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RequestController;
use App\Models\Categories;
use App\Models\Marketplace;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [Authcontroller::class, 'loginadmin'])->name('login');
Route::post('/loginadmin', [Authcontroller::class, 'loginmasuk'])->name('logmasuk.admin');

Route::get('/test-cloudinary', function() {
    try {
        $cloudinary = new \Cloudinary\Cloudinary([
            'cloud' => [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret'),
            ],
            'url' => [
                'secure' => true
            ]
        ]);
        
        return response()->json([
            'status' => 'success',
            'cloud_name' => config('cloudinary.cloud_name'),
            'api_key' => config('cloudinary.api_key'),
            'api_secret_set' => !empty(config('cloudinary.api_secret'))
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
});
Route::middleware(['auth','admin'])->group(function () {
    
    
    Route::get('/dashboard', function(){
        return view('pages.dashboard.shopan');
    })->name('dashboard.show');


    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banner', [BannerController::class, 'storebanner'])->name('banner.upload');
    Route::delete('/banner/delete/{banner_id}', [BannerController::class, 'deletebanner'])->name('banner.delete');


    Route::get('/request', [RequestController::class, 'index'])->name('request.index');
    Route::put('/request-update', [RequestController::class, 'updateRequest'])->name('request.update');
    Route::put('/request-reject', [RequestController::class, 'rejectRequest'])->name('request.reject');
    Route::delete('/request/{id}', [RequestController::class, 'deleteRequest'])->name('request.delete');


    Route::get('/invoice/{order_id}', [OrderController::class, 'viewInvoice'])->name('invoice.view');
    Route::get('/invoice/{order_id}/generate', [OrderController::class, 'generateInvoice'])->name('invoice.generate');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');

    Route::resource('/categories', CategoriesController::class);

    Route::resource('/marketplaces',MarketplaceController::class);

    Route::resource('/blog',AnnouncementController::class);

    Route::post('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout.admin');
});