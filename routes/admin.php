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
        
        Route::resource('category', App\Http\Controllers\Backend\CategoryController::class);
        
        Route::get('trash/category', [App\Http\Controllers\Backend\CategoryController::class, 'trash'])->name('category.trash');
        Route::get('trash/category/restore/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'restore'])->name('category.restore');
        Route::delete('trash/category/delete/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'forceDelete'])->name('category.forcedelete');
        
        // brands
        Route::resource('brand', App\Http\Controllers\Backend\BrandController::class);
        Route::get('trash/brand', [App\Http\Controllers\Backend\BrandController::class, 'trash'])->name('brand.trash');
        
    });
});
