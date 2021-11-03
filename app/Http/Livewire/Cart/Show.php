<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Show extends Component
{
    public Cart $cart;

    public function increment()
    {
        $this->cart->update([
            'quantity' => $this->cart->quantity + 1,
        ]);
    }

    public function decrement()
    {
        $this->cart->update([
            'quantity' => $this->cart->quantity - 1,
        ]);
    }

    public function mount(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.cart.show');
    }
}
