<?php

namespace App\Http\Livewire;

use iPaymu\iPaymu;
use Livewire\Component;

class RequestStoreApproval extends Component
{
    public $have_chosen_pricing_plan;
    public $have_store_information;
    public $have_application_information;
    public $have_whatsapp_number;
    public $have_products;
    public $have_chosen_layout_and_color_theme;
    public $have_all_prerequisites;

    public $form_order;
    public $have_ipaymu_sid;
    public $is_requested;
    public $redirect_payment = null;
    public $transaction = null;

    public function mount()
    {
        if (!auth()->user()->transaction()->exists() && request()->has('trx_id')) {
            $this->save_transaction();
        }

        $user = auth()->user();
        $products = $user->products;
        $form_order = $user->form_order()->firstOrCreate();

        $this->have_chosen_pricing_plan = $form_order->pricing_plan_id;
        $this->have_store_information = $form_order->store_banner_path && $form_order->store_logo_path && $form_order->store_owner && $form_order->store_name;
        $this->have_application_information = $form_order->application_name && $form_order->application_description && $form_order->store_address;
        $this->have_whatsapp_number = $form_order->whatsapp_number;
        $this->have_products = $products->count() > 0;
        $this->have_chosen_layout_and_color_theme = $form_order->layout_id && $form_order->layout_color;
        $this->is_requested = $form_order->is_requested;
        $this->have_ipaymu_sid = $form_order->sid;
        $this->transaction = $user->transaction;
        $this->form_order = $form_order;

        $this->have_all_prerequisites = $this->have_chosen_pricing_plan &&
                                        $this->have_store_information &&
                                        $this->have_application_information &&
                                        $this->have_whatsapp_number &&
                                        $this->have_products &&
                                        $this->have_chosen_layout_and_color_theme;
    }

    public function send_request()
    {
        $user = auth()->user();
        $form_order = $user->form_order;

        $ipaymu_api_key = config('ipaymu.ipaymu_api_key');
        $ipaymu_va = config('ipaymu.ipaymu_virtual_account');
        $ipaymu_prod = config('ipaymu.ipaymu_production');
        $iPaymu = new iPaymu($ipaymu_api_key, $ipaymu_va, $ipaymu_prod);

        $iPaymu->setURL([
            'ureturn' => route('store.index'),
            'unotify' => route('api.store.notify'),
            'ucancel' => route('store.index'),
        ]);

        $iPaymu->setBuyer([
            'name' => $user,
            'phone' => $form_order->whatsapp_number,
            'email' => $user->email,
        ]);

        $iPaymu->addCart([
            'product' => $form_order->pricing_plan->name,
            'quantity' => 1,
            'price' => $form_order->pricing_plan->price,
            'description' => 'Testing',
            'weight' => 1,
        ]);

        $iPaymu->setCOD([
            'pickupArea' => "76111",
            'pickupAddress' => "Denpasar",
            'deliveryArea' => "76111",
            'deliveryAddress' => "Denpasar",
        ]);

        try {
            $redirect_payment = $iPaymu->redirectPayment();
        } catch (\Exception $e) {
            return session()->flash('error', 'Terjadi kesalahan pada Gateway Pembayaran:' . $e->getMessage());
        }

        try {
            auth()->user()->form_order()->update([
                'sid' => $redirect_payment['Data']['SessionID'],
            ]);
        } catch (\Exception $e) {
            return session()->flash('error', 'Sistem gagal menyimpan SID, pembayaran dibatalkan:' . $e->getMessage());
        }

        $this->redirect_payment = $redirect_payment['Data']['Url'];
    }

    public function resend_request()
    {
        try {
            $this->form_order->update([
                'is_requested' => true,
                'is_request_accepted' => null,
                'disapproval_message' => null,
            ]);

            return session()->flash('success', 'Pengajuan berhasil dikirim.');
        } catch (\Exception $e) {
            return session()->flash('error', 'Pengajuan gagal dikirim: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.request-store-approval');
    }

    private function save_transaction()
    {
        if (!auth()->user()->transaction()->exists()) {
            try {
                auth()->user()->transaction()->create([
                    'trx_id' => request()->trx_id,
                    'status' => request()->status,
                    'tipe' => request()->tipe,
                    'via' => request()->via,
                    'channel' => request()->channel,
                    'va' => request()->va ?? null,
                ]);
            } catch (\Exception $e) {
                return session()->flash('error', 'Gagal menyimpan data transaksi.');
            }

            session()->flash('success', 'Berhasil menyimpan data transaksi.');
            return redirect()->route('store.index');
        }
    }
}
