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

    public FormOrder $formOrder;

    protected $rules = [
        'formOrder.store_owner' => ['required', 'string'],
        'formOrder.store_name' => ['required', 'string'],
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
        $this->formOrder = auth()->user()->formOrder()->firstOrCreate();
    }

    public function update()
    {
        $this->validate();

        try {
            if ($this->store_banner_path) {
                if (Storage::exists($this->formOrder->store_banner_path)) Storage::delete($this->formOrder->store_banner_path);

                $this->formOrder->store_banner_path = $this->store_banner_path->store('store_banners');
            }

            if ($this->store_logo_path) {
                if (Storage::exists($this->formOrder->store_logo_path)) Storage::delete($this->formOrder->store_logo_path);

                $this->formOrder->store_logo_path = $this->store_logo_path->store('store_logos');
            }

            $this->formOrder->update();
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
