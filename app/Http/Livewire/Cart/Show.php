<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Show extends Component
{
    public Cart $cart;
    public $quantity;

    public function increment()
    {
        $this->cart->update([
            'quantity' => $this->cart->quantity + 1,
        ]);
        $this->quantity = $this->cart->quantity;
        $this->emitUp('quantity_updated');
    }

    public function decrement()
    {
        $this->cart->update([
            'quantity' => $this->cart->quantity - 1,
        ]);
        $this->quantity = $this->cart->quantity;
        $this->emitUp('quantity_updated');
    }

    public function set_amount()
    {
        $this->cart->update([
            'quantity' => $this->quantity,
        ]);
        $this->emitUp('quantity_updated');
    }

    public function mount(Cart $cart)
    {
        $this->cart = $cart;
        $this->quantity = $cart->quantity;
    }

    public function render()
    {
        return view('livewire.cart.show');
    }
}
