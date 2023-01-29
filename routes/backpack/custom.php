<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('customer', 'CustomerCrudController');
    Route::crud('orders', 'OrderCrudController');
    Route::crud('order-item', 'OrderItemCrudController');
    Route::crud('driver', 'DriverCrudController');
    Route::crud('order-status', 'OrderStatusCrudController');
    Route::crud('authour', 'AuthourCrudController');
    Route::crud('contact-request', 'ContactRequestCrudController');
    Route::crud('partner', 'PartnerCrudController');
    Route::crud('social', 'SocialCrudController');
    Route::crud('publisher', 'PublisherCrudController');
    Route::crud('setting', 'SettingCrudController');
    Route::crud('discount', 'DiscountCrudController');
    Route::crud('db', 'DbCrudController');
}); // this should be the absolute last line of this file
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('db/change', 'DbController@change');
}); // this should be the absolute last line of this file
