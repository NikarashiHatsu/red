<?php

namespace App\Http\Livewire\Admin\UserRequest;

use App\Models\FormOrder;
use App\Models\Product;
use App\Models\Progress;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination,
        \App\Http\Livewire\Traits\Colors;

    public FormOrder $form_order;
    public Product $product;

    public $disapproval_message = '';
    public $disapprove = '';

    protected $rules = [
        'disapproval_message' => ['string'],
    ];

    public function mount(FormOrder $form_order) {
        $this->form_order = $form_order;
        $this->product = $form_order->user->products->first();
        $this->disapprove = false;
        $this->disapproval_message = '';
    }

    public function change_product_displayed(Product $product)
    {
        $this->product = $product;
    }

    public function approve()
    {
        try {
            $this->form_order->update([
                'is_request_accepted' => true,
            ]);

            Progress::create([
                'user_id' => $this->form_order->user->id,
            ]);
        } catch (\Exception $e) {
            return session()->flash('error', 'Permintaan gagal disetujui: ' . $e->getMessage());
        }

        return session()->flash('success', 'Permintaan berhasil disetujui.');
    }

    public function disapprove()
    {
        $this->disapprove = true;
        $this->disapproval_message = '';
    }

    public function cancel_disapproval()
    {
        $this->disapprove = false;
    }

    public function confirm_disapproval()
    {
        $this->validate();

        try {
            $this->form_order->update([
                'is_requested' => null,
                'is_request_accepted' => false,
                'disapproval_message' => $this->disapproval_message,
            ]);
        } catch (\Exception $e) {
            return session()->flash('error', 'Gagal mengirim pesan ketidaksetujuan: ' . $e->getMessage());
        }

        $this->reset(['disapproval_message', 'disapprove']);
        return session()->flash('success', 'Pesan ketidaksetujuan berhasil dikirim.');
    }

    public function render()
    {
        return view('livewire.admin.user-request.show', [
            'products' => $this->form_order->user->products()->paginate(6),
        ]);
    }
}
