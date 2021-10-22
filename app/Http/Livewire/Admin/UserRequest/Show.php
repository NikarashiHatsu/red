<?php

namespace App\Http\Livewire\Admin\UserRequest;

use App\Models\FormOrder;
use App\Models\Product;
use App\Models\Progress;
use Livewire\Component;

class Show extends Component
{
    public FormOrder $form_order;
    public Product $product;

    public $disapproval_message = '';
    public $disapprove = '';

    public $color_schemes_available = [
        [
            'nama' => 'Red',
            'class' => 'bg-red-500 hover:bg-red-700',
        ],
        [
            'nama' => 'Orange',
            'class' => 'bg-orange-500 hover:bg-orange-700',
        ],
        [
            'nama' => 'Amber',
            'class' => 'bg-amber-500 hover:bg-amber-700',
        ],
        [
            'nama' => 'Yellow',
            'class' => 'bg-yellow-500 hover:bg-yellow-700',
        ],
        [
            'nama' => 'Lime',
            'class' => 'bg-lime-500 hover:bg-lime-700',
        ],
        [
            'nama' => 'Green',
            'class' => 'bg-green-500 hover:bg-green-700',
        ],
        [
            'nama' => 'Emerald',
            'class' => 'bg-emerald-500 hover:bg-emerald-700',
        ],
        [
            'nama' => 'Teal',
            'class' => 'bg-teal-500 hover:bg-teal-700',
        ],
        [
            'nama' => 'Cyan',
            'class' => 'bg-cyan-500 hover:bg-cyan-700',
        ],
        [
            'nama' => 'Sky',
            'class' => 'bg-sky-500 hover:bg-sky-700',
        ],
        [
            'nama' => 'Blue',
            'class' => 'bg-blue-500 hover:bg-blue-700',
        ],
        [
            'nama' => 'Indigo',
            'class' => 'bg-indigo-500 hover:bg-indigo-700',
        ],
        [
            'nama' => 'Violet',
            'class' => 'bg-violet-500 hover:bg-violet-700',
        ],
        [
            'nama' => 'Purple',
            'class' => 'bg-purple-500 hover:bg-purple-700',
        ],
        [
            'nama' => 'Fuchsia',
            'class' => 'bg-fuchsia-500 hover:bg-fuchsia-700',
        ],
        [
            'nama' => 'Pink',
            'class' => 'bg-pink-500 hover:bg-pink-700',
        ],
        [
            'nama' => 'Rose',
            'class' => 'bg-rose-500 hover:bg-rose-700',
        ],
    ];

    public $color_scheme_detail = [
        null => [
            'navbar_color' => 'text-gray-700',
            'anchor_color' => 'hover:text-gray-800',
            'light_color' => 'bg-gray-50',
            'border_color' => 'border-gray-200',
            'card_list_color' => 'bg-gray-50 hover:bg-gray-100',
        ],
        'Red' => [
            'navbar_color' => 'bg-red-500 text-white',
            'anchor_color' => 'hover:text-red-600',
            'light_color' => 'bg-red-50',
            'border_color' => 'border-red-200',
            'card_list_color' => 'bg-red-500 hover:bg-red-600 text-white',
        ],
        'Orange' => [
            'navbar_color' => 'bg-orange-500 text-white',
            'anchor_color' => 'hover:text-orange-600',
            'light_color' => 'bg-orange-50',
            'border_color' => 'border-orange-200',
            'card_list_color' => 'bg-orange-500 hover:bg-orange-600 text-white',
        ],
        'Amber' => [
            'navbar_color' => 'bg-amber-500 text-white',
            'anchor_color' => 'hover:text-amber-600',
            'light_color' => 'bg-amber-50',
            'border_color' => 'border-amber-200',
            'card_list_color' => 'bg-amber-500 hover:bg-amber-600 text-white',
        ],
        'Yellow' => [
            'navbar_color' => 'bg-yellow-500 text-white',
            'anchor_color' => 'hover:text-yellow-600',
            'light_color' => 'bg-yellow-50',
            'border_color' => 'border-yellow-200',
            'card_list_color' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        ],
        'Lime' => [
            'navbar_color' => 'bg-lime-500 text-white',
            'anchor_color' => 'hover:text-lime-600',
            'light_color' => 'bg-lime-50',
            'border_color' => 'border-lime-200',
            'card_list_color' => 'bg-lime-500 hover:bg-lime-600 text-white',
        ],
        'Green' => [
            'navbar_color' => 'bg-green-500 text-white',
            'anchor_color' => 'hover:text-green-600',
            'light_color' => 'bg-green-50',
            'border_color' => 'border-green-200',
            'card_list_color' => 'bg-green-500 hover:bg-green-600 text-white',
        ],
        'Emerald' => [
            'navbar_color' => 'bg-emerald-500 text-white',
            'anchor_color' => 'hover:text-emerald-600',
            'light_color' => 'bg-emerald-50',
            'border_color' => 'border-emerald-200',
            'card_list_color' => 'bg-emerald-500 hover:bg-emerald-600 text-white',
        ],
        'Teal' => [
            'navbar_color' => 'bg-teal-500 text-white',
            'anchor_color' => 'hover:text-teal-600',
            'light_color' => 'bg-teal-50',
            'border_color' => 'border-teal-200',
            'card_list_color' => 'bg-teal-500 hover:bg-teal-600 text-white',
        ],
        'Cyan' => [
            'navbar_color' => 'bg-cyan-500 text-white',
            'anchor_color' => 'hover:text-cyan-600',
            'light_color' => 'bg-cyan-50',
            'border_color' => 'border-cyan-200',
            'card_list_color' => 'bg-cyan-500 hover:bg-cyan-600 text-white',
        ],
        'Sky' => [
            'navbar_color' => 'bg-sky-500 text-white',
            'anchor_color' => 'hover:text-sky-600',
            'light_color' => 'bg-sky-50',
            'border_color' => 'border-sky-200',
            'card_list_color' => 'bg-sky-500 hover:bg-sky-600 text-white',
        ],
        'Blue' => [
            'navbar_color' => 'bg-blue-500 text-white',
            'anchor_color' => 'hover:text-blue-600',
            'light_color' => 'bg-blue-50',
            'border_color' => 'border-blue-200',
            'card_list_color' => 'bg-blue-500 hover:bg-blue-600 text-white',
        ],
        'Indigo' => [
            'navbar_color' => 'bg-indigo-500 text-white',
            'anchor_color' => 'hover:text-indigo-600',
            'light_color' => 'bg-indigo-50',
            'border_color' => 'border-indigo-200',
            'card_list_color' => 'bg-indigo-500 hover:bg-indigo-600 text-white',
        ],
        'Violet' => [
            'navbar_color' => 'bg-violet-500 text-white',
            'anchor_color' => 'hover:text-violet-600',
            'light_color' => 'bg-violet-50',
            'border_color' => 'border-violet-200',
            'card_list_color' => 'bg-violet-500 hover:bg-violet-600 text-white',
        ],
        'Purple' => [
            'navbar_color' => 'bg-purple-500 text-white',
            'anchor_color' => 'hover:text-purple-600',
            'light_color' => 'bg-purple-50',
            'border_color' => 'border-purple-200',
            'card_list_color' => 'bg-purple-500 hover:bg-purple-600 text-white',
        ],
        'Fuchsia' => [
            'navbar_color' => 'bg-fuchsia-500 text-white',
            'anchor_color' => 'hover:text-fuchsia-600',
            'light_color' => 'bg-fuchsia-50',
            'border_color' => 'border-fuchsia-200',
            'card_list_color' => 'bg-fuchsia-500 hover:bg-fuchsia-600 text-white',
        ],
        'Pink' => [
            'navbar_color' => 'bg-pink-500 text-white',
            'anchor_color' => 'hover:text-pink-600',
            'light_color' => 'bg-pink-50',
            'border_color' => 'border-pink-200',
            'card_list_color' => 'bg-pink-500 hover:bg-pink-600 text-white',
        ],
        'Rose' => [
            'navbar_color' => 'bg-rose-500 text-white',
            'anchor_color' => 'hover:text-rose-600',
            'light_color' => 'bg-rose-50',
            'border_color' => 'border-rose-200',
            'card_list_color' => 'bg-rose-500 hover:bg-rose-600 text-white',
        ],
    ];

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
        return view('livewire.admin.user-request.show');
    }
}
