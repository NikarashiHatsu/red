<?php

namespace App\Http\Livewire\Admin\UserRequest;

use App\Models\FormOrder;
use Livewire\Component;

class Index extends Component
{
    public $waiting_for_approval;
    public $accepted;
    public $rejected;

    public function mount()
    {
        $this->waiting_for_approval = FormOrder::where([['is_requested', true], ['is_request_accepted', null]])->orderByDesc('created_at')->get();
        $this->accepted = FormOrder::where('is_request_accepted', true)->orderByDesc('created_at')->get();
        $this->rejected = FormOrder::where('is_request_accepted', false)->orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.admin.user-request.index');
    }
}
