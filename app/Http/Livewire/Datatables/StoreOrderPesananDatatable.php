<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Sale;
use Illuminate\Support\Facades\Storage;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StoreOrderPesananDatatable extends LivewireDatatable
{
    public function builder()
    {
        return Sale::query()
            ->with(['product', 'buyer'])
            ->where('store_id', auth()->user()->form_order->id);
    }

    public function columns()
    {
        return [
            Column::name('product_id')
                ->label('ID Produk'),

            Column::callback('product.product_photo_path', function($photo) {
                    $photo = Storage::url($photo);

                    return "<img src='$photo' class='object-cover w-12 h-12 p-0 m-0 border rounded' />";
                })
                ->label('Foto Produk'),

            Column::name('product.name')
                ->label('Nama Produk'),

            Column::callback('quantity', function($q) {
                    return "$q";
                })
                ->label('Kuantitas'),

            Column::name('buyer.name')
                ->label('Nama Pembeli'),

            Column::name('address')
                ->label('Alamat Pembeli'),

            // Column::callback('total')
        ];
    }
}