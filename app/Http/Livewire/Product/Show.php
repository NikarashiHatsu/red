<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Show extends Component
{
    use \App\Traits\Colors;

    public $product;
    public $component;
    public $form_order;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->form_order = $product->user->form_order;
        $this->component = 'product-detail-layouts.layout-' . $this->form_order->layout_id;

        RateLimiter::attempt("product-counter:{$product->id}", 1, function() use($product) {
            $product->product_views()->create([
                'user_id' => auth()->user()->id ?? null,
            ]);
        }, 3600);
    }

    public function render()
    {
        return view('livewire.product.show')
            ->layout('layouts.guest');
    }
}
