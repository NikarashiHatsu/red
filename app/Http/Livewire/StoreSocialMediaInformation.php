<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Livewire\Component;

class StoreSocialMediaInformation extends Component
{
    public FormOrder $formOrder;

    protected $rules = [
        'formOrder.whatsapp_number' => ['required', 'integer'],
        'formOrder.youtube_url' => ['nullable', 'url'],
        'formOrder.facebook_url' => ['nullable', 'url'],
        'formOrder.instagram_url' => ['nullable', 'url'],
        'formOrder.twitter_url' => ['nullable', 'url'],
    ];

    public function mount()
    {
        $this->formOrder = auth()->user()->formOrder()->firstOrCreate();
    }

    public function update()
    {
        $this->validate();

        try {
            $this->formOrder->update();
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
