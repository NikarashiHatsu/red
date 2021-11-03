<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use App\Models\Product;
use Livewire\Component;

class FrontPage extends Component
{
    use \App\Traits\Colors;

    public $featured_products;
    public $featured_merchants;
    public $products_in_cart;

    public function mount()
    {
        $this->featured_products = Product::has('has_form_order')->take(12)->get();
        $this->featured_merchants = FormOrder::where('is_request_accepted', 1)->take(6)->get();

        if (auth()->user()) {
            $this->products_in_cart = auth()->user()->carts()?->get()->map(function($cart) {
                return $cart->product_id;
            }) ?? [];
        }
    }

    public function render()
    {
        return view('livewire.front-page')
            ->layout('layouts.front-page');
    }
}
