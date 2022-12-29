<?php

namespace App\Http\Livewire\Admin\UserRequest;

use App\Models\FormOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.user-request.index', [
            'waiting_for_approval' => FormOrder::where([['is_requested', true], ['is_request_accepted', null]])
                ->orderByDesc('created_at')
                ->paginate(10),
            'accepted' => FormOrder::where('is_request_accepted', true)->orderByDesc('created_at')
                ->orderByDesc('created_at')
                ->paginate(10),
            'rejected' => FormOrder::where('is_request_accepted', false)->orderByDesc('created_at')
                ->orderByDesc('created_at')
                ->paginate(10),
        ]);
    }
}
