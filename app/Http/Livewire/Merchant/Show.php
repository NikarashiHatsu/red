<?php

namespace App\Http\Livewire\Merchant;

use App\Models\FormOrder;
use Livewire\Component;

class Show extends Component
{
    use \App\Http\Livewire\Traits\Colors;

    public $component;
    public $form_order;

    public function mount(FormOrder $merchant)
    {
        $progress = $merchant->user->progress;
        if (!$progress->is_apk_created
            || !$progress->is_published_on_google_play
            || !$progress->google_play_url) {
                abort(404);
        }

        $this->component = 'store-layouts.layout-' . $merchant->layout_id;
        $this->form_order = $merchant;
    }

    public function render()
    {
        return view('livewire.merchant.show', [
                'products' => $this->form_order->user->products()->paginate(6),
            ])
            ->layout('layouts.guest');
    }
}
