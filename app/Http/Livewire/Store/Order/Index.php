<?php

namespace App\Http\Livewire\Store\Order;

use Livewire\Component;

class Index extends Component
{
    public $sales;
    public $sale_id;

    public function confirm(int $id)
    {
        $sale = \App\Models\Sale::find($id);
        return redirect()->back()->with('success', $sale);
    }

    public function mount()
    {
        $this->sales = auth()->user()->store_sales;
    }

    public function render()
    {
        return view('livewire.store.order.index');
    }
}
