<?php

use App\Models\FormOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/store/notify', function() {
    try {
        FormOrder::where('sid', request()->sid)->update([
            'is_requested' => 1,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
        ]);
    }

    return response()->json([
        'message' => 'Berhasil',
    ]);
})->name('api.store.notify');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
