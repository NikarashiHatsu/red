<?php

namespace App\Http\Livewire;

use App\Models\FormOrder;
use App\Models\PricingPlan;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class StorePricingPlan extends Component
{
    public $pricing_plans;

    public FormOrder $form_order;

    public $pricing_keys = [
        'name' => '',
        'has_app' => 'pricing.application',
        'has_released_on_google_play' => 'pricing.release_on_google_play',
        'narrative_product_count' => 'pricing.product_count',
        'has_blog' => 'pricing.blog',
        'has_hosting_and_domain' => 'pricing.hosting_and_domain',
        'has_self_manage' => 'pricing.self_manage',
        'has_online_payment' => 'pricing.online_payment',
        'has_whatsapp_integration' => 'pricing.whatsapp_integration',
        'has_sale_transaction' => 'pricing.sale_transaction',
        // 'has_aposerba_integration' => 'pricing.aposerba_integration',
        'has_ad_mob_integration' => 'pricing.ad_mob_integration',
        'has_api_integration' => 'pricing.has_api_integration',
        'modified_price' => 'pricing.price',
        'button' => '',
    ];

    protected $rules = [
        'form_order.pricing_plan_id' => ['required', 'integer', 'exists:pricing_plans,id'],
    ];

    public function update($pricing_plan_id)
    {
        Gate::authorize('update', $this->form_order);

        $this->form_order->pricing_plan_id = $pricing_plan_id;

        $this->validate();

        try {
            $this->form_order->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Gagal memilih paket harga: ' . $e->getMessage());
        }

        session()->flash('success', 'Berhasil memilih paket harga.');
        return redirect()->route('store.form_order.index');
    }

    public function mount()
    {
        $this->pricing_plans = PricingPlan::all();
        $this->form_order = auth()->user()->form_order()->firstOrCreate();
    }

    public function render()
    {
        return view('livewire.store-pricing-plan');
    }
}
