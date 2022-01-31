<?php

namespace App\Http\Livewire;

use App\Models\StoreView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataKunjunganTokoDataTable extends LivewireDatatable
{
    public $exportable = true;
    public $date_from;
    public $date_to;

    protected $listeners = [
        'filter_date',
    ];

    public function filter_date($date_from, $date_to)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->emit('$refresh');
    }

    public function builder()
    {
        return StoreView::query()
            ->with('form_order', 'form_order.pricing_plan')
            ->when($this->date_from != null && $this->date_to != null, function($query) {
                return $query->whereBetween('store_views.created_at', [$this->date_from, $this->date_to]);
            })
            ->groupBy('form_order_id');
    }

    public function columns()
    {
        return [
            Column::name('form_order.store_name')->label('Nama Toko')->searchable(),
            Column::name('form_order.pricing_plan.name')->label('Paket Harga')->searchable(),
            Column::raw('COUNT(store_views.id)')->label('Jumlah Kunjungan')->defaultSort('desc'),
        ];
    }
}