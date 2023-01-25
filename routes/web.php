<?php

use App\Http\Controllers\Customer\{
    CartController,
    ForgetController,
    LoginController,
    LogoutController,
    OrderController,
    RegisterController,
};
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Website\{
    HomeController,
    ProductController,
    StoreController
};
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

Route::get('/Product/{id}', [ProductController::class,'show']);

Route::get('/store', [StoreController::class,'show']);
Route::get('/', [HomeController::class,'show']);
Route::post('/contact', [HomeController::class,'submit']);

Route::get('/login', [LoginController::class,'show']);
Route::post('/login', [LoginController::class,'submit']);

Route::get('/register', [RegisterController::class,'show']);
Route::post('/register', [RegisterController::class,'submit']);

Route::get('/forget', [ForgetController::class,'show']);
Route::post('/forget', [ForgetController::class,'submit']);

Route::get('/verify/email/{token}', [RegisterController::class,'verifyEmail']);

Route::group([
    'middleware'=>'CustomerAuth'
],function () {
    Route::resource('/cart', CartController::class);
    Route::post('/checkCode', [CartController::class,'checkDiscount']);
    Route::resource('/order', OrderController::class);
    Route::get('/logout', [LogoutController::class,'submit']);
});

Route::get('/set-language/{locale}', [LanguageController::class,'setLanguage'])->name('set-language');
