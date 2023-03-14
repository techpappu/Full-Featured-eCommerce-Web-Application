<?php

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

Route::get('/', function () {
    return view('front-end.default.shop.welcome');
})->name('home');

/*
# Front-end landing page, login and register pages
Route::get('/', \App\Http\Controllers\Frontend\Index::class);
Route::get('/login', \App\Http\Controllers\Frontend\Login::class);
Route::get('/register', \App\Http\Controllers\Frontend\Register::class);
Route::get('/change-password', \App\Http\Controllers\Frontend\ChangePassword::class);
Route::get('/reset-password', \App\Http\Controllers\Frontend\ResetPassword::class);
Route::get('/profile', \App\Http\Controllers\Frontend\Profile::class);

# Front-end category listing, category product listing and product pages
Route::get('/categories', \App\Http\Controllers\Frontend\Category\Index::class);
Route::get('/category/{id}/{slug}', \App\Http\Controllers\Frontend\Category\Product::class);
Route::get('/product/{id}/{slug}', \App\Http\Controllers\Frontend\Product\Index::class);

# Front-end cart page
Route::get('/cart', \App\Http\Controllers\Frontend\Cart\Index::class);

# Front-end checkout pages
Route::get('/checkout', \App\Http\Controllers\Frontend\Checkout\Index::class);
Route::get('/checkout/delivery', \App\Http\Controllers\Frontend\Checkout\Delivery::class);
Route::get('/checkout/payment', \App\Http\Controllers\Frontend\Checkout\Payment::class);
Route::get('/checkout/response', \App\Http\Controllers\Frontend\Checkout\Response::class);

# Front-end order page
Route::get('/order', \App\Http\Controllers\Frontend\Order\Index::class);
Route::get('/order/status', \App\Http\Controllers\Frontend\Order\Status::class);

# Front-end page 
Route::get('/page/{id}/{slug}', \App\Http\Controllers\Frontend\Page\Index::class);
*/