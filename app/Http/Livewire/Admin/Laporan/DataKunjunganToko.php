<?php

namespace App\Http\Livewire\Admin\Laporan;

use App\Models\StoreView;
use Livewire\Component;

class DataKunjunganToko extends Component
{
    public $labels = [];
    public $data = [];

    public $form_order_id = null;
    public $date_from = null;
    public $date_to = null;

    public function updatedDateFrom()
    {
        $this->updatedFormOrderId();
    }

    public function updatedDateTo()
    {
        $this->updatedFormOrderId();
    }

    public function updatedFormOrderId()
    {
        $data = StoreView::query()
            ->selectRaw('form_order_id, DATE_FORMAT(created_at, "%Y-%m-%d") AS date, COUNT(id) AS count')
            ->where('form_order_id', $this->form_order_id)
            ->when($this->date_from != null && $this->date_to != null, function($query) {
                $query->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })
            ->groupByRaw('date')
            ->get();

        $this->labels = $data->pluck('date');
        $this->data = $data->pluck('count');
        $this->emit('chartUpdate', $this->labels, $this->data);
        $this->emitTo('data-kunjungan-toko-data-table', 'filter_date', $this->date_from, $this->date_to);
    }

    public function render()
    {
        return view('livewire.admin.laporan.data-kunjungan-toko', [
            'form_orders' => StoreView::with(['form_order' => function($query) {
                    $query->whereNotNull('store_name');
                }])
                ->get()
                ->pluck('form_order.store_name', 'form_order.id'),
        ]);
    }
}
