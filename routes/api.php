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
        // BEGIN: UNTUK PENGAJUAN TOKO
        if ($request->resultCode == '02') {
            \App\Models\DuitkuTransaction::where('reference', $request->reference)->delete();

            return redirect()->route('store.index');
        }

        if (\App\Models\DuitkuTransaction::where('reference', $request->reference)->exists()) {
            $transaction = \App\Models\DuitkuTransaction::updateOrCreate(
                ['reference' => $request->reference],
                [
                    'merchant_order_id' => $request->merchantOrderId,
                    'result_code' => $request->resultCode,
                ]
            );

            $limit = \App\Models\FormOrder::where('id', $transaction->form_order_id)
                ->first()
                ->pricing_plan
                ->number_of_products;

            \App\Models\Product::where('user_id', $transaction->form_order_id)
                ->each(function($prod, $index) use($limit) {
                    if ($index >= $limit) {
                        $prod->delete();
                    }
                });

            \App\Models\FormOrder::where('id', $transaction->form_order_id)->update([
                'is_requested' => true,
            ]);

            return redirect()->route('store.index');
        }
        // END: UNTUK PENGAJUAN TOKO

        // BEGIN: PEMBELIAN BARANG
        if (\App\Models\Sale::where('reference', $request->reference)->exists()) {
            $sales = \App\Models\Sale::where('reference', $request->reference);
            $sales->update([
                'merchant_order_id' => $request->merchantOrderId,
                'result_code' => $request->resultCode,
                'is_paid' => 1,
            ]);

            $sales->each(function($sale) {
                \App\Models\Cart::where('product_id', $sale->product_id)
                    ->where('user_id', $sale->user_id)
                    ->delete();

                \App\Models\Product::where('id', $sale->product_id)
                    ->decrement('stock', $sale->quantity);
            });

            return redirect()->route('cart.index')->with('success', 'Berhasil membeli barang');
        }
        // END: PEMBELIAN BARANG
    })->name('return');

    Route::get('callback', function(Request $request) {
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