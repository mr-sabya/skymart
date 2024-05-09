<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\Ecom\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\Frontend\Ecom\ShopController::class, 'index'])->name('shop.index');

Route::get('/about-us', [App\Http\Controllers\Frontend\Ecom\AboutController::class, 'index'])->name('about.index');

Route::get('/vendors', [App\Http\Controllers\Frontend\Ecom\VendorController::class, 'index'])->name('vendor.index');

Route::get('/blog', [App\Http\Controllers\Frontend\Ecom\BlogController::class, 'index'])->name('blog.index');

Route::get('/contact-us', [App\Http\Controllers\Frontend\Ecom\ContactController::class, 'index'])->name('contact.index');

