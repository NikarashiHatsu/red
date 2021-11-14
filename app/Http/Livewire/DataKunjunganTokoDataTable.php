<?php

namespace App\Http\Livewire;

use App\Models\Progress;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DataKunjunganTokoDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $date_from;

    public function builder()
    {
        return Progress::query()
            ->leftJoin('form_orders', 'form_orders.user_id', 'progress.user_id')
            ->leftJoin('pricing_plans', 'pricing_plans.id', 'form_orders.pricing_plan_id')
            ->leftJoin('products', 'products.user_id', 'progress.user_id')
            ->whereNull('products.deleted_at')
            ->groupBy('progress.id');
    }

    public function columns()
    {
        $date_from = $this->date_from;

        return [
            Column::name('form_orders.store_name')
                ->label('Nama Toko'),

            Column::name('pricing_plans.name')
                ->label('Paket Harga'),

            Column::raw('COUNT(products.id) AS jumlah_produk'),

            NumberColumn::name('form_orders.view_counter')
                ->label('Jumlah Pengunjung')
                ->defaultSort('desc'),
        ];
    }
}