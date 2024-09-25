<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfilesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::post('/upload-image', [DashboardController::class, 'uploadImage'])->name('videos');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'company-profile', 'as' => 'company-profile.'], function () {
        Route::get('/', [CompanyProfilesController::class, 'index'])->name('company-profile');
        Route::post('/', [CompanyProfilesController::class, 'update']);
        Route::post('/contact', [CompanyProfilesController::class, 'store_contact']);
        Route::delete('/contact/{id}', [CompanyProfilesController::class, 'destroy_contact']);
        Route::get('/contact/{id}', [CompanyProfilesController::class, 'get_detail']);
        Route::put('/contact/{id}', [CompanyProfilesController::class, 'update_contact']);
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'get_detail']);
        Route::put('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery');
        Route::post('/', [GalleryController::class, 'store']);
        Route::get('/{id}', [GalleryController::class, 'get_detail']);
        Route::put('/{id}', [GalleryController::class, 'update']);
        Route::delete('/{id}', [GalleryController::class, 'destroy']);
    });

    Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {
        Route::get('/', [VideoController::class, 'index'])->name('videos');
        Route::post('/', [VideoController::class, 'store']);
        Route::delete('/{id}', [VideoController::class, 'destroy']);
        Route::get('/{id}', [VideoController::class, 'get_detail']);
        Route::put('/{id}', [VideoController::class, 'update']);
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::post('/', [NewsController::class, 'store']);
        Route::delete('/{id}', [NewsController::class, 'destroy']);
        Route::get('/{id}', [NewsController::class, 'get_detail']);
        Route::put('/{id}', [NewsController::class, 'update']);
    });

    Route::group(['prefix' => 'activity', 'as' => 'activity.'], function () {
        Route::get('/', [ActivityController::class, 'index'])->name('activity');
        Route::post('/', [ActivityController::class, 'store']);
        Route::delete('/{id}', [ActivityController::class, 'destroy']);
        Route::get('/{id}', [ActivityController::class, 'get_detail']);
        Route::put('/{id}', [ActivityController::class, 'update']);
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::post('/', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'get_detail']);
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::post('/', [ProductController::class, 'store_category'])->name('product-category');
            Route::put('/{id}', [ProductController::class, 'update_category']);
            Route::delete('/{id}', [ProductController::class, 'destroy_category']);
        });
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'get_detail']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::put('/active/{id}', [UserController::class, 'set_active']);
    });
});

require __DIR__ . '/auth.php';
