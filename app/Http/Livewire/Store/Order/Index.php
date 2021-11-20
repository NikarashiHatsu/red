<?php

namespace App\Http\Livewire\Store\Order;

use App\Models\Sale;
use Livewire\Component;

class Index extends Component
{
    public $order_type = 'semua';
    public $inactive_classes = '!bg-transparent !border !border-gray-700 !text-gray-700 hover:text-white';

    protected $listeners = [
        'ask_confirmation',
        'cancel_confirmation',
        'approve_confirmation',
    ];

    // Sale Confirmation Purposes
    public $sale_will_be_confirmed;
    public $has_confirmation;
    public $sale_to_be_send = null;

    // BEGIN: Functions to send a product
    public function ask_confirmation(Sale $sale)
    {
        $this->sale_will_be_confirmed = $sale;
        $this->has_confirmation = 'Apakah Anda yakin ingin mengkonfirmasi produk ' . $sale->product->name . '?';
    }

    public function cancel_confirmation()
    {
        $this->sale_will_be_confirmed = null;
        $this->has_confirmation = null;
    }

    public function approve_confirmation()
    {
        try {
            $this->sale_will_be_confirmed->update([
                'is_confirmed' => true,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        session()->flash('success', 'Berhasil mengkonfirmasi produk.');
    }
    // END: Functions to send a product

    // Data filtering
    public function change_order_type(string $new_type)
    {
        $this->order_type = $new_type;
    }

    public function render()
    {
        return view('livewire.store.order.index');
    }
}
