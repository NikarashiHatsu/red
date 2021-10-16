<?php

namespace App\Http\Livewire;

use App\Models\PricingPlan;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MasterPricingPlanForm extends Component
{
    public PricingPlan $pricingPlan;

    protected $rules = [
        'pricingPlan.name' => ['required', 'string'],
        'pricingPlan.has_app' => ['required', 'boolean'],
        'pricingPlan.has_released_on_google_play' => ['required', 'boolean'],
        'pricingPlan.number_of_products' => ['required', 'integer'],
        'pricingPlan.has_blog' => ['required', 'boolean'],
        'pricingPlan.has_hosting_and_domain' => ['required', 'boolean'],
        'pricingPlan.has_self_manage' => ['required', 'boolean'],
        'pricingPlan.has_online_payment' => ['required', 'boolean'],
        'pricingPlan.has_whatsapp_integration' => ['required', 'boolean'],
        'pricingPlan.has_sale_transaction' => ['required', 'boolean'],
        'pricingPlan.has_aposerba_integration' => ['required', 'boolean'],
        'pricingPlan.has_ad_mob_integration' => ['required', 'boolean'],
        'pricingPlan.price' => ['required', 'integer'],
    ];

    public function mount(PricingPlan $pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;
    }

    public function save()
    {
        Gate::authorize('create', PricingPlan::class);

        $this->validate();

        try {
            auth()->user()->pricingPlans()->save($this->pricingPlan);
        } catch (\Exception $e) {
            return session()->flash('error', 'Gagal membuat Paket Harga:' . $e->getMessage());
        }

        session()->flash('success', 'Berhasil membuat Paket Harga.');

        return redirect()->route('admin.master.pricing_plan.index');
    }

    public function update()
    {
        Gate::authorize('update', $this->pricingPlan);

        $this->validate();

        try {
            $this->pricingPlan->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Gagal memperbarui Paket Harga:' . $e->getMessage());
        }

        session()->flash('success', 'Berhasil memperbarui Paket Harga.');

        return redirect()->route('admin.master.pricing_plan.index');
    }

    public function render()
    {
        return view('livewire.master-pricing-plan-form');
    }
}
