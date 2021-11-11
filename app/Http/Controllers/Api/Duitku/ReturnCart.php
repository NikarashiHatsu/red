<?php

namespace App\Http\Controllers\Api\Duitku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnCart extends Controller
{
    public function handle(Request $request)
    {
        switch ($request->resultCode) {
            case '00':
                // SUCCESS
                return $this->handleSuccessRequest($request);
                break;

            case '01':
            case '02':
                default:
                // PENDING(01)/CANCELED(02)
                return $this->handlePendingOrCanceledRequest();
                break;
        }
    }

    private function putCartIntoSale(Request $request, bool $isPaid)
    {
        try {
            $user = \App\Models\User::find($request->user_id);
            $carts = $user->carts->load(['store', 'product']);

            $carts->filter(function($cart) {
                if ($cart->product->stock != 0 && $cart->product->has_form_order->direct_transfer_bank == null) {
                    return $cart;
                }
            })->each(function($cart) use($request, $isPaid, $user) {
                \App\Models\Sale::create([
                    'user_id' => $user->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'address' => $request->address,
                    'phone_number' => $request->phone_number,
                    'is_paid' => $isPaid,
                    'is_product_sent' => false,
                    'is_product_received' => false,
                    'reference' => $request->reference,
                    'merchant_order_id' => $request->merchantOrderId,
                    'result_code' => $request->resultCode,
                ]);

                $cart->delete();
                $cart->product()->decrement('stock', $cart->quantity);
            });

            return redirect()->route('cart.index', [
                'status' => 'success',
                'message' => 'Pembayaran berhasil diterima!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('cart.index', [
                'status' => 'error',
                'message' => 'Pembayaran berhasil namun terjadi kesalahan pada sistem: ' . $e->getMessage(),
            ]);
        }
    }

    private function handlePendingOrCanceledRequest()
    {
        return redirect()->route('cart.index', [
            'status' => 'error',
            'message' => 'Pembayaran dibatalkan.'
        ]);
    }

    private function handleSuccessRequest(Request $request)
    {
        return $this->putCartIntoSale($request, true);
    }
}
