<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Sale;
use Illuminate\Support\Facades\Storage;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StoreOrderPesananDatatable extends LivewireDatatable
{
    private $button_classes = 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150';
    public $order_type;

    public function builder()
    {
        return Sale::query()
            ->with(['product', 'buyer'])
            ->where('store_id', auth()->user()->form_order->id);
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->label('ID Pesanan')
                ->defaultSort('desc'),

            Column::callback(['product.product_photo_path'], function($photo) {
                    $img = Storage::url($photo);

                    return "
                        <img src='$img' class='align-text-top inline p-0 border-none w-10 h-10 rounded'>
                    ";
                })
                ->label('Foto Produk'),

            Column::callback(['product.name'], function($name) {
                    return "
                        <p class='line-clamp-2 p-0 border-none'>
                            $name
                        </p>
                    ";
                })
                ->label('Nama Produk')
                ->searchable('product.name'),

            Column::callback('quantity', function($q) {
                    return "$q";
                })
                ->label('Kuantitas'),

            Column::callback(['quantity', 'product.price'], function($q, $price) {
                    return 'Rp' . number_format($q * $price, 0, '.', '.');
                })
                ->label('Harga Total'),

            Column::callback(['sales.phone_number'], function($phone) {
                    return $phone != null ? $phone : "<i class='p-0 border-none text-xs'>Tidak tersedia</i>";
                })
                ->label('No. HP')
                ->searchable('sales.phone_number'),

            Column::name('buyer.name')
                ->label('Nama Pembeli')
                ->searchable('buyer.name'),

            Column::callback(['sales.address'], function($address) {
                    return $address != null ? $address : "<i class='p-0 border-none text-xs'>Tidak tersedia</i>";
                })
                ->label('Alamat')
                ->searchable('sales.address'),

            Column::callback(['is_confirmed'], function($is_confirmed) {
                    if (!$is_confirmed) {
                        return "<div class='italic border-none bg-red-500 text-white p-1 text-xs text-center rounded'>Belum dikonfirmasi</div>";
                    }

                    if ($is_confirmed) {
                        return "<div class='italic border-none bg-yellow-500 text-white p-1 text-xs text-center rounded'>Belum dikirim</div>";
                    }
                })
                ->label('Status'),

            Column::callback(['id', 'is_confirmed'], function($id, $is_confirmed) {
                    // Belum dikonfirmasi
                    if (!$is_confirmed) {
                        return "
                            <button wire:click=\"\$emitUp('ask_confirmation', $id)\" class='border-none p-0 {$this->button_classes}'>
                                Konfirmasi
                            </button>
                        ";
                    }

                    // Belum dikirim
                    if ($is_confirmed) {
                        return "
                            <button wire:click=\"\$emitUp('send_product', $id)\" class='border-none p-0 {$this->button_classes}'>
                                Kirim Produk
                            </button>
                        ";
                    }
                })
                ->label('Opsi'),
        ];
    }
}