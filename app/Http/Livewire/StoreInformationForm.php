<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreInformationForm extends Component
{
    use WithFileUploads;

    public $store_banner_path;
    public $store_logo_path;
    public $direct_transfer;

    public FormOrder $form_order;

    protected $rules = [
        'direct_transfer' => ['nullable', 'boolean'],
        'form_order.store_owner' => ['required', 'string'],
        'form_order.store_name' => ['required', 'string'],
        'form_order.direct_transfer_bank' => ['required_if:direct_transfer,1', 'nullable', 'string'],
        'form_order.direct_transfer_to' => ['required_if:direct_transfer,1', 'required_with:form_order.direct_transfer_bank', 'nullable', 'string'],
    ];

    protected $messages = [
        'form_order.direct_transfer_bank.required_if' => 'Kolom Nama Bank wajib diisi jika Anda memilih opsi transfer langsung.',
        'form_order.direct_transfer_to.required_if' => 'Kolom No. Rekening wajib diisi jika Anda memilih opsi transfer langsung.',
        'form_order.direct_transfer_to.required_with' => 'Kolom No. Rekening wajib diisi jika kolom Nama Bank memiliki isian.',
    ];

    public function updatedStoreBannerPath()
    {
        $this->validate([
            'store_banner_path' => ['required', 'image', 'max:4096'],
        ]);
    }

    public function updatedStoreLogoPath()
    {
        $this->validate([
            'store_logo_path' => ['required', 'image', 'max:4096'],
        ]);
    }

    public function mount()
    {
        $this->form_order = auth()->user()->form_order()->firstOrCreate();
        $this->direct_transfer = $this->form_order->direct_transfer_bank && $this->form_order->direct_transfer_to;
    }

    public function update()
    {
        Gate::authorize('update', $this->form_order);

        $this->validate();

        try {
            if ($this->store_banner_path) {
                if (Storage::exists($this->form_order->store_banner_path)) Storage::delete($this->form_order->store_banner_path);

                $this->form_order->store_banner_path = $this->store_banner_path->store('store_banners');
            }

            if ($this->store_logo_path) {
                if (Storage::exists($this->form_order->store_logo_path)) Storage::delete($this->form_order->store_logo_path);

                $this->form_order->store_logo_path = $this->store_logo_path->store('store_logos');
            }

            if (!$this->direct_transfer) {
                $this->form_order->direct_transfer_bank = null;
                $this->form_order->direct_transfer_to = null;
            }

            $this->form_order->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Informasi toko gagal disimpan: ' . $e->getMessage());
        }

        session()->flash('success', 'Informasi toko berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.store-information-form');
    }
}
