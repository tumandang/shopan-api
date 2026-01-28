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
Route::get('/cloudinary-test', function () {
    try {
        $result = Cloudinary::upload(public_path('img/bg-shopan.jpg'));
        return [
            'secure_url' => $result->getSecurePath(),
        ];
    } catch (\Exception $e) {
        return [
            'error' => $e->getMessage(),
            'env_cloudinary_url' => env('CLOUDINARY_URL'),
            'config_cloud_name' => config('filesystems.disks.cloudinary.cloud_name')
        ];
    }
});
Route::middleware(['auth'])->group(function () {
    
    
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