<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PolicyPage extends Component
{
    public function render()
    {
        return view('livewire.policy-page')
            ->layout('layouts.front-page');
    }
}
