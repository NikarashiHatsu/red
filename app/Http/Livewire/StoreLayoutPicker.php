<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class StoreLayoutPicker extends Component
{
    use WithPagination,
        \App\Traits\Colors;

    public FormOrder $form_order;
    public $product_displayed;
    public $store_layout_component = null;
    public $store_product_detail_component = null;

    public $layouts = [
        1 => 'Layout 1',
    ];

    public function update_color($color)
    {
        try {
            $this->form_order->update([
                'layout_color' => $color,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Tema Warna gagal diperbarui: ' . $e->getMessage());
            return;
        }

        session()->flash('success', 'Tema Warna berhasil diperbarui.');
        return;
    }

    public function change_product_displayed(Product $product)
    {
        $this->product_displayed = $product;
    }

    public function update_layout($layout_id)
    {
        try {
            $this->form_order->update([
                'layout_id' => $layout_id,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Tema Warna gagal diperbarui: ' . $e->getMessage());
            return;
        }

        $this->store_layout_component = 'store-layouts.layout-' . $layout_id;
        $this->store_product_detail_component = 'product-detail-layouts.layout-' . $layout_id;
        session()->flash('success', 'Tema Warna berhasil diperbarui.');
        return;
    }

    public function mount()
    {
        $this->form_order = auth()->user()->form_order;
        $this->product_displayed = $this->form_order->user->products->first() ?? null;

        if ($this->form_order->layout_id) {
            $this->store_layout_component = 'store-layouts.layout-' . $this->form_order->layout_id;
            $this->store_product_detail_component = 'product-detail-layouts.layout-' . $this->form_order->layout_id;
        }
    }

    public function render()
    {
        $products = $this->form_order->user->products()->take($this->form_order->pricing_plan->number_of_products);

        return view('livewire.store-layout-picker', [
            'products' => $products->paginate(6),
            'product_count' => $products->get()->count(),
        ]);
    }
}
