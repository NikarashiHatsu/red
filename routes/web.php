<?php

use App\Http\Controllers\PricingPlanController;
use App\Http\Controllers\Store\PricingPlanController as StorePricingPlanController;
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

Route::get('auth_redirector', function() {
    $user = auth()->user();

    if ($user->role == 'user') {
        return redirect()->route('store.index');
    }

    if ($user->role == 'admin') {
        return redirect()->route('admin.index');
    }

    return abort(401);
})->middleware('auth')->name('auth_redirector');

Route::group(['prefix' => 'merchant', 'as' => 'merchant.'], function() {
    Route::get('/', \App\Http\Livewire\Merchant\Index::class)->name('index');
    Route::get('/{merchant}', \App\Http\Livewire\Merchant\Show::class)->name('show');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function() {
    Route::get('/{show}', \App\Http\Livewire\Product\Show::class)->name('show');
});

Route::group(['middleware' => 'auth'], function() {
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

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin:verified'], function() {
        Route::view('/', 'admin.index')->name('index');

        Route::group(['prefix' => 'master', 'as' => 'master.'], function() {
            Route::resource('pricing_plan', PricingPlanController::class)->only(['index', 'create', 'edit', 'destroy']);
        });

        Route::view('/user_request', 'admin.user_request.index')->name('user_request.index');
        Route::get('/user_request/show/{form_order}', \App\Http\Livewire\Admin\UserRequest\Show::class)->name('user_request.show');
        Route::get('/progress/index', \App\Http\Livewire\Admin\Progress\Index::class)->name('progress.index');
    });
});

require __DIR__.'/auth.php';
