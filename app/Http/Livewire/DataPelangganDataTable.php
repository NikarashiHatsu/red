<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataPelangganDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $complex = false;

    public function builder()
    {
        $user = auth()->user();

        return Sale::query()
            ->leftJoin('products', 'products.id', 'sales.product_id')
            ->leftJoin('users', 'users.id', 'sales.user_id')
            ->where('products.user_id', '=', $user->id)
            ->groupBy('sales.user_id');
    }

    public function columns()
    {
        return [
            Column::name('users.name')
                ->label('Nama Pelanggan')
                ->searchable(),

            NumberColumn::raw('SUM(sales.quantity) AS quantity')
                ->label('Total Produk Dibeli'),

            NumberColumn::raw("CONCAT('Rp', FORMAT(SUM(sales.quantity * products.price), 0, 'id_ID')) AS total_pengeluaran")
                ->label('Total Pengeluaran')
                ->sortBy('SUM(sales.quantity * products.price)')
                ->defaultSort('desc'),
        ];
    }
}