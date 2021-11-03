<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        try {
            auth()->user()->carts()->create([
                'product_id' => $request->product_id,
                'store_id' => Product::find($request->product_id)->user_id,
                'quantity' => 1,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk ke keranjang:' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus produk dari keranjang:' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus produk dari keranjang.');
    }
}
