<?php

use App\Http\Controllers\PricingPlanController;
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

Route::get('/', \App\Http\Livewire\FrontPage::class)->name('index');

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
    Route::get('/{product}', \App\Http\Livewire\Product\Show::class)->name('show');
});

Route::group(['middleware' => 'auth'], function() {
    require __DIR__ . '/store.php';
    require __DIR__ . '/admin.php';
});

require __DIR__.'/auth.php';
