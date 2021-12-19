<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FrontPage extends Component
{
    use \App\Traits\Colors;
    use WithPagination;

    public $featured_products;
    public $products_in_cart;

    public function mount()
    {
        $this->featured_products = Product::query()
            ->whereHas('form_order')
            ->whereHas('user.progress')
            ->with('form_order', 'user', 'user.form_order', 'product_views')
            ->withSum('sale', 'quantity')
            ->orderBy('sale_sum_quantity', 'DESC')
            ->take(12)
            ->get();

        if (auth()->user()) {
            $this->products_in_cart = auth()->user()->carts()?->get()->map(function($cart) {
                return $cart->product_id;
            }) ?? [];
        }
    }

    public function render()
    {
        $featured_merchants = FormOrder::where('is_request_accepted', 1)
            ->with(['products' => function($query) {
                $query->orderBy('sale_sum_quantity', 'DESC');
            }, 'store_views', 'products.product_views'])
            ->withSum('sale', 'quantity')
            ->withCount('store_views')
            ->orderBy('store_views_count', 'DESC')
            ->orderBy('sale_sum_quantity', 'DESC')
            ->paginate(6);

        return view('livewire.front-page', [
                'featured_merchants' => $featured_merchants,
            ])
            ->layout('layouts.front-page');
    }
}