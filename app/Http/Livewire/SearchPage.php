<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPage extends Component
{
    use WithPagination;

    public $keyword;
    public $products_in_cart;

    public function mount()
    {
        $this->keyword = request()->keyword;
        if (auth()->user()) {
            $this->products_in_cart = auth()->user()->carts()?->get()->map(function($cart) {
                return $cart->product_id;
            }) ?? [];
        }
    }

    public function render()
    {
        return view('livewire.search-page', [
                'merchants' => $this->_get_merchants(),
                'products' => $this->_get_products(),
            ])
            ->layout('layouts.front-page');
    }

    private function _get_products()
    {
        return Product::query()
            ->where('name', 'like', '%' . $this->keyword . '%')
            ->whereHas('form_order', function($query) {
                $query->where('is_request_accepted', 1);
            })
            ->with('form_order', 'user', 'user.form_order', 'product_views')
            ->withSum('sale', 'quantity')
            ->paginate(12);
    }

    private function _get_merchants()
    {
        return FormOrder::query()
            ->where('store_name', 'like', '%' . $this->keyword . '%')
            ->where('is_request_accepted', 1)
            ->paginate(4);
    }
}
