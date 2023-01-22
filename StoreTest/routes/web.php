<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//  get and show home page
Route::get('/', function () {
    return view('home');
})->name('home');

// middleware for guest user to login and register
Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

});
// logout for auth user
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// view catalog
Route::get('/catalog', [\App\Http\Controllers\PostController::class, 'getPost'])->name('catalog');
// view cart
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'getCart'])->name('getCart');

// change changeCartQuantity
Route::post('/cartQuantity/{post_id}', [\App\Http\Controllers\CartController::class, 'changeCartQuantity'])->name('changeCartQuantity');

// delCartPost
Route::post('/delCartPost/{post_id}', [\App\Http\Controllers\CartController::class, 'delCartPost'])->name('delCartPost');

// add to cart controller
Route::post('/addToCart/{post_id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');

// show order
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'orders'])->name('orders');


// create order
Route::post('/addOrder', [\App\Http\Controllers\OrderController::class, 'addOrder'])->name('addOrder');
