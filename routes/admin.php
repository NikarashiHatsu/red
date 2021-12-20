<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin:verified'], function() {
    Route::get('/', \App\Http\Livewire\Admin\Index::class)->name('index');

    Route::group(['prefix' => 'master', 'as' => 'master.'], function() {
        Route::resource('pricing_plan', App\Http\Controllers\PricingPlanController::class)->only(['index', 'create', 'edit', 'destroy']);
    });

    Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function() {
        Route::get('/data_pengguna', \App\Http\Livewire\Admin\Laporan\DataPengguna::class)->name('data_pengguna');
        Route::get('/data_kunjungan_toko', \App\Http\Livewire\Admin\Laporan\DataKunjunganToko::class)->name('data_kunjungan_toko');
    });

    Route::view('/user_request', 'admin.user_request.index')->name('user_request.index');
    Route::get('/user_request/show/{form_order}', \App\Http\Livewire\Admin\UserRequest\Show::class)->name('user_request.show');
    Route::get('/progress/index', \App\Http\Livewire\Admin\Progress\Index::class)->name('progress.index');
});