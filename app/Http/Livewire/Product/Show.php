<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public $product;
    public $component;
    public $form_order;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->form_order = $product->user->form_order;
        $this->component = 'product-detail-layouts.layout-' . $this->form_order->layout_id;
    }

    public function render()
    {
        return view('livewire.product.show')
            ->layout('layouts.guest');
    }
}
