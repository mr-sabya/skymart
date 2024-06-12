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
        
        Route::get('trash/category', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'trash'])->name('category.trash');
        Route::get('trash/category/restore/{id}', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'restore'])->name('category.restore');
        Route::delete('trash/category/delete/{id}', [App\Http\Controllers\Backend\Ecom\CategoryController::class, 'forceDelete'])->name('category.forcedelete');
        
        // brands
        Route::resource('brand', App\Http\Controllers\Backend\Ecom\BrandController::class);
        Route::get('trash/brand', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'trash'])->name('brand.trash');
        Route::get('trash/brand/restore/{id}', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'restore'])->name('brand.restore');
        Route::delete('trash/brand/delete/{id}', [App\Http\Controllers\Backend\Ecom\BrandController::class, 'forceDelete'])->name('brand.forcedelete');
        
        // attributes
        Route::resource('attribute', App\Http\Controllers\Backend\Ecom\AttributeController::class);
        Route::get('trash/attribute', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'trash'])->name('attribute.trash');
        Route::get('trash/attribute/restore/{id}', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'restore'])->name('attribute.restore');
        Route::delete('trash/attribute/delete/{id}', [App\Http\Controllers\Backend\Ecom\AttributeController::class, 'forceDelete'])->name('attribute.forcedelete');
        
    });
});
