<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Index extends Component
{
    public $carts;

    public function mount()
    {
        $this->carts = auth()->user()->carts->load(['store', 'product']);
    }

    public function render()
    {
        return view('livewire.cart.index')
            ->layout('layouts.front-page');
    }
}
