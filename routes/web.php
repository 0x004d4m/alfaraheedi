<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Website\ProductController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Product/{id}', [ProductController::class,'show']);

Route::get('/set-language/{locale}', [LanguageController::class,'setLanguage'])->name('set-language');
