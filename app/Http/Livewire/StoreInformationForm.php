<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreInformationForm extends Component
{
    use WithFileUploads;

    public $store_banner_path;
    public $store_logo_path;

    public FormOrder $form_order;

    protected $rules = [
        'form_order.store_owner' => ['required', 'string'],
        'form_order.store_name' => ['required', 'string'],
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
    }

    public function update()
    {
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
