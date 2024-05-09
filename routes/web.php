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


// Auth::routes();

Route::get('/', [App\Http\Controllers\Frontend\Ecom\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\Frontend\Ecom\ShopController::class, 'index'])->name('shop.index');

Route::get('/about-us', [App\Http\Controllers\Frontend\Ecom\AboutController::class, 'index'])->name('about.index');

Route::get('/vendors', [App\Http\Controllers\Frontend\Ecom\VendorController::class, 'index'])->name('vendor.index');

Route::get('/blog', [App\Http\Controllers\Frontend\Ecom\BlogController::class, 'index'])->name('blog.index');

Route::get('/contact-us', [App\Http\Controllers\Frontend\Ecom\ContactController::class, 'index'])->name('contact.index');


// login
Route::get('/login', [App\Http\Controllers\Frontend\Ecom\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Frontend\Ecom\Auth\LoginController::class, 'login'])->name('login');

// registration
Route::get('/register', [App\Http\Controllers\Frontend\Ecom\Auth\RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Frontend\Ecom\Auth\RegisterController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\Frontend\Ecom\Auth\ProfileController::class, 'profile'])->name('profile.index');

    // order
    Route::get('/order', [App\Http\Controllers\Frontend\Ecom\Auth\OrderController::class, 'index'])->name('order.index');
    Route::get('/track-order', [App\Http\Controllers\Frontend\Ecom\Auth\OrderController::class, 'track'])->name('order.track');
});
