<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class StoreApplicationInformation extends Component
{
    public FormOrder $form_order;
    public $has_api_integration;

    protected $rules = [
        'has_api_integration' => ['boolean', 'nullable'],
        // Form Order
        'form_order.application_name' => ['required', 'string'],
        'form_order.application_description' => ['required', 'string'],
        'form_order.store_address' => ['required', 'string'],
        'form_order.api_merchant_code' => ['nullable', 'required_if:has_api_integration,1', 'string'],
        'form_order.api_integration_key' => ['nullable', 'required_if:has_api_integration,1', 'string'],
        'form_order.store_url' => ['nullable', 'url'],
    ];

    protected $messages = [
        'form_order.api_merchant_code.required_if' => 'Field Kode Merchant Duitku harus diisi jika Anda mencentang Integrasi Duitku.',
        'form_order.api_integration_key.required_if' => 'Field Kode API Duitku harus diisi jika Anda mencentang Integrasi Duitku.',
    ];

    public function update()
    {
        Gate::authorize('update', $this->form_order);

        $this->validate();

        if (!$this->has_api_integration) {
            $this->form_order->api_merchant_code = null;
            $this->form_order->api_integration_key = null;
        }

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
        $this->has_api_integration = $this->form_order->api_integration_key && $this->form_order->api_merchant_code;
    }

    public function render()
    {
        return view('livewire.store-application-information');
    }
}
