<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin:verified'], function() {
    Route::view('/', 'admin.index')->name('index');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function() {
        Route::resource('pricing_plan', PricingPlanController::class)->only(['index', 'create', 'edit', 'destroy']);
    });

    Route::view('/user_request', 'admin.user_request.index')->name('user_request.index');
    Route::get('/user_request/show/{form_order}', \App\Http\Livewire\Admin\UserRequest\Show::class)->name('user_request.show');
    Route::get('/progress/index', \App\Http\Livewire\Admin\Progress\Index::class)->name('progress.index');
});