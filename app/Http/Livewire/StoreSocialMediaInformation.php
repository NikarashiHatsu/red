<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class StoreSocialMediaInformation extends Component
{
    public FormOrder $form_order;

    protected $rules = [
        'form_order.whatsapp_number' => ['required', 'integer'],
        'form_order.youtube_url' => ['nullable', 'url'],
        'form_order.facebook_url' => ['nullable', 'url'],
        'form_order.instagram_url' => ['nullable', 'url'],
        'form_order.twitter_url' => ['nullable', 'url'],
    ];

    public function mount()
    {
        $this->form_order = auth()->user()->form_order()->firstOrCreate();
    }

    public function update()
    {
        Gate::authorize('update', $this->form_order);

        $this->validate();

        try {
            $this->form_order->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Informasi Sosial Media gagal disimpan: ' . $e->getMessage());
        }

        session()->flash('success', 'Informasi Sosial Media berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.store-social-media-information');
    }
}
