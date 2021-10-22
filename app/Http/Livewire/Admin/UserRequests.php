<?php

namespace App\Http\Livewire\Admin;

use App\Models\FormOrder;
use Livewire\Component;

class UserRequests extends Component
{
    public $form_orders;

    public function mount()
    {
        $this->form_orders = FormOrder::where('is_request_accepted', null)->get();
    }

    public function render()
    {
        return view('livewire.admin.user-requests');
    }
}
