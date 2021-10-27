<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'store', 'as' => 'store.', 'middleware' => 'user:verified'], function() {
    Route::view('/', 'store.index')->name('index');

    Route::group(['middleware' => 'restrict_access_after_request'], function() {
        Route::view('/pricing_plan', 'store.pricing_plan.index')->name('pricing_plan.index');
    });

    Route::group(['prefix' => 'form_order', 'as' => 'form_order.', 'middleware' => 'has_pricing_plan'], function() {
        Route::view('/', 'store.form_order.index')->name('index');
        Route::view('/application_information', 'store.form_order.application_information')->name('application_information');
        Route::view('/social_media_information', 'store.form_order.social_media_information')->name('social_media_information');
        Route::view('/product_information', 'store.form_order.product_information')->name('product_information');
        Route::view('/layout_picker', 'store.form_order.layout_picker')->name('layout_picker');
    });
});