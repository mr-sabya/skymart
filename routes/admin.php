<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::name('admin.')->group(function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

        Route::resource('category', App\Http\Controllers\Backend\Ecom\CategoryController::class);
        Route::prefix('trash')->name('category.')->group(function () {
            Route::get('/category', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'trash'])->name('trash');
            Route::get('/category/restore/{id}', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'restore'])->name('restore');
            Route::delete('/category/delete/{id}', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'forceDelete'])->name('forcedelete');
        });

        // brands
        Route::resource('brand', App\Http\Controllers\Backend\Ecom\BrandController::class);
        Route::prefix('trash')->name('brand.')->group(function () {
            Route::get('/brand', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'trash'])->name('trash');
            Route::get('/brand/restore/{id}', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'restore'])->name('restore');
            Route::delete('/brand/delete/{id}', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'forceDelete'])->name('forcedelete');
        });

        // attributes
        Route::resource('attribute', App\Http\Controllers\Backend\Ecom\AttributeController::class);
        Route::prefix('trash')->name('attribute.')->group(function () {
            Route::get('/attribute', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'trash'])->name('trash');
            Route::get('/attribute/restore/{id}', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'restore'])->name('restore');
            Route::delete('/attribute/delete/{id}', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'forceDelete'])->name('forcedelete');
        });

        // attribute item
        Route::prefix('attribute/items')->name('attribute-item.')->group(function () {
            Route::get('/{attribute}', [App\Http\Controllers\Backend\Ecom\AttributeItemController::class, 'index'])->name('index');
            Route::post('/store', [App\Http\Controllers\Backend\Ecom\AttributeItemController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [App\Http\Controllers\Backend\Ecom\AttributeItemController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Backend\Ecom\AttributeItemController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\Backend\Ecom\AttributeItemController::class, 'destroy'])->name('destroy');
        });

        // tags
        Route::resource('tag', App\Http\Controllers\Backend\TagController::class);
        Route::prefix('trash')->name('tag.')->group(function () {
            Route::get('/tag', [App\Http\Controllers\Backend\TagController::class, 'trash'])->name('trash');
            Route::get('/tag/restore/{id}', [App\Http\Controllers\Backend\TagController::class, 'restore'])->name('restore');
            Route::delete('/tag/delete/{id}', [App\Http\Controllers\Backend\TagController::class, 'forceDelete'])->name('forcedelete');
        });


        // product
        Route::resource('product', App\Http\Controllers\Backend\Ecom\ProductController::class);
        Route::prefix('trash')->name('product.')->group(function () {
            Route::get('/product', [App\Http\Controllers\Backend\Ecom\ProductController::class, 'trash'])->name('trash');
            Route::get('/product/restore/{id}', [App\Http\Controllers\Backend\Ecom\ProductController::class, 'restore'])->name('restore');
            Route::delete('/product/delete/{id}', [App\Http\Controllers\Backend\Ecom\ProductController::class, 'forceDelete'])->name('forcedelete');
        });

        // product image
        Route::prefix('images/product')->name('product-image.')->group(function () {
            Route::get('/{product}', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'index'])->name('index');
            Route::get('/{product}/create', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\Backend\Ecom\ProductImageController::class, 'destroy'])->name('destroy');
        });

        // product info
        Route::prefix('info/product')->name('product-info.')->group(function () {
            Route::get('/{product}', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'index'])->name('index');
            Route::get('/{product}/create', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\Backend\Ecom\ProductInfoController::class, 'destroy'])->name('destroy');
        });

        // product variations
        Route::prefix('variants/product')->name('product-variant.')->group(function () {
            Route::get('/{product}', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'index'])->name('index');
            Route::get('/{product}/create', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [App\Http\Controllers\Backend\Ecom\ProductVariationController::class, 'destroy'])->name('destroy');
        });


        // slider
        Route::resource('slider', App\Http\Controllers\Backend\SliderController::class);
        Route::prefix('trash')->name('slider.')->group(function () {
            Route::get('/slider', [App\Http\Controllers\Backend\SliderController::class, 'trash'])->name('trash');
            Route::get('/slider/restore/{id}', [App\Http\Controllers\Backend\SliderController::class, 'restore'])->name('restore');
            Route::delete('/slider/delete/{id}', [App\Http\Controllers\Backend\SliderController::class, 'forceDelete'])->name('forcedelete');
        });

        // banner 
        Route::resource('banner', App\Http\Controllers\Backend\BannerController::class);
        Route::prefix('trash')->name('banner.')->group(function () {
            Route::get('/banner', [App\Http\Controllers\Backend\BannerController::class, 'trash'])->name('trash');
            Route::get('/banner/restore/{id}', [App\Http\Controllers\Backend\BannerController::class, 'restore'])->name('restore');
            Route::delete('/banner/delete/{id}', [App\Http\Controllers\Backend\BannerController::class, 'forceDelete'])->name('forcedelete');
        });

        // srvices for about page
        Route::resource('service', App\Http\Controllers\Backend\ServiceController::class);
        Route::prefix('trash')->name('service.')->group(function () {
            Route::get('/service', [App\Http\Controllers\Backend\ServiceController::class, 'trash'])->name('trash');
            Route::get('/service/restore/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'restore'])->name('restore');
            Route::delete('/service/delete/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'forceDelete'])->name('forcedelete');
        });

        // team members
        Route::resource('team', App\Http\Controllers\Backend\TeamController::class);
        Route::prefix('trash')->name('team.')->group(function () {
            Route::get('/team', [App\Http\Controllers\Backend\TeamController::class, 'trash'])->name('trash');
            Route::get('/team/restore/{id}', [App\Http\Controllers\Backend\TeamController::class, 'restore'])->name('restore');
            Route::delete('/team/delete/{id}', [App\Http\Controllers\Backend\TeamController::class, 'forceDelete'])->name('forcedelete');
        });
    });
});
