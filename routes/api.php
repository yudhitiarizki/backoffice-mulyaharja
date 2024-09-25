<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [ApiController::class, 'index']);
    Route::get('/contact', [ApiController::class, 'get_contact']);
});

Route::group(['prefix' => 'activity', 'as' => 'activity.'], function () {
    Route::get('/', [ActivityController::class, 'index']);
    Route::get('/{id}', [ActivityController::class, 'detail']);
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'detail']);
});

Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
    Route::get('/', [GalleryController::class, 'index']);
});

Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/get/recent', [NewsController::class, 'recent']);
    Route::get('/{id}', [NewsController::class, 'detail']);
});

Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {
    Route::get('/', [VideoController::class, 'index']);
    Route::get('/{id}', [VideoController::class, 'detail']);
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/detail/{id}', [ProductController::class, 'detail']);

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [ProductController::class, 'get_category'])->name('product-category');
    });
});
