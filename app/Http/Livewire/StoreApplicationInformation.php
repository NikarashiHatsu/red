<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Livewire\Component;

class StoreApplicationInformation extends Component
{
    public FormOrder $form_order;

    protected $rules = [
        'form_order.application_name' => ['required', 'string'],
        'form_order.application_description' => ['required', 'string'],
        'form_order.store_address' => ['required', 'string'],
        'form_order.store_url' => ['nullable', 'url'],
    ];

    public function update()
    {
        $this->validate();

        try {
            $this->form_order->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Informasi Aplikasi gagal disimpan: ' . $e->getMessage());
        }

        session()->flash('success', 'Informasi Aplikasi berhasil disimpan.');
    }

    public function mount()
    {
        $this->form_order = auth()->user()->form_order()->firstOrCreate();
    }

    public function render()
    {
        return view('livewire.store-application-information');
    }
}
