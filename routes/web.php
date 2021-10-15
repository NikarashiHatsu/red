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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'verified:auth'], function() {
    Route::group(['prefix' => 'store', 'as' => 'store.'], function() {
        Route::view('/', 'store.index')->name('index');
        Route::view('/pricing_plan', 'store.pricing_plan.index')->name('pricing_plan');

        Route::group(['prefix' => 'form_order', 'as' => 'form_order.'], function() {
            Route::view('/', 'store.form_order.index')->name('index');
            Route::view('/informasi_aplikasi', 'store.form_order.informasi_aplikasi')->name('informasi_aplikasi');
            Route::view('/informasi_media_sosial', 'store.form_order.informasi_media_sosial')->name('informasi_media_sosial');
            Route::view('/informasi_produk', 'store.form_order.informasi_produk')->name('informasi_produk');
            Route::view('/pilih_layout', 'store.form_order.pilih_layout')->name('pilih_layout');
        });
    });

    Route::redirect('/dashboard', '/store')->name('dashboard');
});


require __DIR__.'/auth.php';
