<?php

use App\Models\FormOrder;
use App\Models\Transaction;
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

        Transaction::where('trx_id', request()->trx_id)->update([
            'status' => request()->status,
            'via' => request()->via,
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

Route::group(['prefix' => 'duitku', 'as' => 'duitku.'], function() {
    Route::get('return', function(Request $request) {
        if ($request->page == 'toko') {
            return (new \App\Http\Controllers\Api\Duitku\ReturnToko)->handle($request);
        }

        if ($request->page == 'cart') {
            return (new \App\Http\Controllers\Api\Duitku\ReturnCart)->handle($request);
        }
    })->name('return');

    Route::get('callback', function(Request $request) {
        \Illuminate\Support\Facades\Log::info('Duitku Callback: ', $request->all());

        $apiKey = config('duitku.api_key');
        $merchantCode = $request->merchantCode ?? null;
        $merchantOrderId = $request->merchantOrderId ?? null;
        $merchantUserId = $request->merchantUserId ?? null;
        $amount = $request->amount ?? null;
        $productDetail = $request->productDetail ?? null;
        $additionalParam = $request->additionalParam ?? null;
        $paymentMethod = $request->paymentCode ?? null;
        $resultCode = $request->resultCode ?? null;
        $reference = $request->reference ?? null;
        $signature = $request->signature ?? null;

        if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
        {
            $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if($signature == $calcSignature) {
                \App\Models\DuitkuTransaction::updateOrCreate(
                    ['reference' => $reference],
                    [
                        'merchant_code' => $merchantCode,
                        'merchant_order_id' => $merchantOrderId,
                        'merchant_user_id' => $merchantUserId,
                        'amount' => $amount,
                        'product_detail' => $productDetail,
                        'additional_param' => $additionalParam,
                        'payment_method' => $paymentMethod,
                        'result_code' => $resultCode,
                        'signature' => $signature,
                    ]
                );

                echo "SUCCESS";
            } else {
                throw new Exception('Bad Signature');
            }
        } else {
            throw new Exception('Bad Parameter');
        }
    })->name('callback');
});