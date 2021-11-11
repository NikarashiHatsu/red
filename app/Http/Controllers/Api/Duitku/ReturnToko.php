<?php

namespace App\Http\Controllers\Api\Duitku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnToko extends Controller
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

    private function handlePendingOrCanceledRequest()
    {
        return redirect()->route('store.index', [
            'status' => 'error',
            'message' => 'Pembayaran dibatalkan oleh pengguna.',
        ]);
    }

    private function handleSuccessRequest(Request $request)
    {
        try {
            $user = \App\Models\User::find($request->user_id);

            \App\Models\DuitkuTransaction::create([
                'user_id' => $user->id,
                'form_order_id' => $user->form_order->id,
                'merchant_order_id' => $request->merchantOrderId,
                'result_code' => $request->resultCode,
                'reference' => $request->reference,
            ]);

            \App\Models\FormOrder::where('id', $user->form_order->id)->update([
                'is_requested' => true,
            ]);

            return redirect()->route('store.index', [
                'status' => 'success',
                'message' => 'Pembayaran berhasil.',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('store.index', [
                'status' => 'error',
                'message' => 'Pembayaran berhasil namun terjadi kesalahan pada sistem: ' . $e->getMessage(),
            ]);
        }
    }
}
