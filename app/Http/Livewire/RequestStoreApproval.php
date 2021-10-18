<?php

namespace App\Http\Livewire;

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

    public function mount()
    {
        $user = auth()->user();
        $products = $user->products;
        $form_order = $user->form_order;

        $this->have_chosen_pricing_plan = $form_order->pricing_plan_id;
        $this->have_store_information = $form_order->store_banner_path && $form_order->store_logo_path && $form_order->store_owner && $form_order->store_name;
        $this->have_application_information = $form_order->application_name && $form_order->application_description && $form_order->store_address;
        $this->have_whatsapp_number = $form_order->whatsapp_number;
        $this->have_products = $products->count() > 0;
        $this->have_chosen_layout_and_color_theme = $form_order->layout_id && $form_order->layout_color;

        $this->have_all_prerequisites = $this->have_chosen_pricing_plan &&
                                        $this->have_store_information &&
                                        $this->have_application_information &&
                                        $this->have_whatsapp_number &&
                                        $this->have_products &&
                                        $this->have_chosen_layout_and_color_theme;
    }

    public function render()
    {
        return view('livewire.request-store-approval');
    }
}
