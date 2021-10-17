<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Livewire\Component;

class StoreApplicationInformation extends Component
{
    public FormOrder $formOrder;

    protected $rules = [
        'formOrder.application_name' => ['required', 'string'],
        'formOrder.application_description' => ['required', 'string'],
        'formOrder.store_address' => ['required', 'string'],
        'formOrder.store_url' => ['nullable', 'url'],
    ];

    public function update()
    {
        $this->validate();

        try {
            $this->formOrder->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Informasi Aplikasi gagal disimpan: ' . $e->getMessage());
        }

        session()->flash('success', 'Informasi Aplikasi berhasil disimpan.');
    }

    public function mount() 
    {
        $this->formOrder = auth()->user()->formOrder()->firstOrCreate();
    }

    public function render()
    {
        return view('livewire.store-application-information');
    }
}
