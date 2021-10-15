<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    // TODO: Implement gate for this controller
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Return list of pricing plan available
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Return form to create new pricing plan
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'has_app' => ['required', 'boolean'],
            'has_released_on_google_play' => ['required', 'boolean'],
            'number_of_products' => ['required', 'integer'],
            'has_blog' => ['required', 'boolean'],
            'has_hosting_and_domain' => ['required', 'boolean'],
            'has_self_manage' => ['required', 'boolean'],
            'has_online_payment' => ['required', 'boolean'],
            'has_whatsapp_integration' => ['required', 'obolean'],
            'has_sale_transaction' => ['required', 'boolean'],
            'has_aposerba_integration' => ['required', 'boolean'],
            'has_ad_mob_integration' => ['required', 'boolean'],
            'price' => ['required', 'integer'],
        ]);

        try {
            PricingPlan::create($request->only([
                'name',
                'has_app',
                'has_released_on_google_play',
                'number_of_products',
                'has_blog',
                'has_hosting_and_domain',
                'has_self_manage',
                'has_online_payment',
                'has_whatsapp_integration',
                'has_sale_transaction',
                'has_aposerba_integration',
                'has_ad_mob_integration',
                'price',
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat Paket Harga: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil membuat Paket Harga.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPlan $pricingPlan)
    {
        // TODO: Detail pricing plan
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingPlan $pricingPlan)
    {
        // TODO: Edit pricing plan
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingPlan $pricingPlan)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'has_app' => ['required', 'boolean'],
            'has_released_on_google_play' => ['required', 'boolean'],
            'number_of_products' => ['required', 'integer'],
            'has_blog' => ['required', 'boolean'],
            'has_hosting_and_domain' => ['required', 'boolean'],
            'has_self_manage' => ['required', 'boolean'],
            'has_online_payment' => ['required', 'boolean'],
            'has_whatsapp_integration' => ['required', 'obolean'],
            'has_sale_transaction' => ['required', 'boolean'],
            'has_aposerba_integration' => ['required', 'boolean'],
            'has_ad_mob_integration' => ['required', 'boolean'],
            'price' => ['required', 'integer'],
        ]);

        try {
            $pricingPlan->update($request->only([
                'name',
                'has_app',
                'has_released_on_google_play',
                'number_of_products',
                'has_blog',
                'has_hosting_and_domain',
                'has_self_manage',
                'has_online_payment',
                'has_whatsapp_integration',
                'has_sale_transaction',
                'has_aposerba_integration',
                'has_ad_mob_integration',
                'price',
            ]));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengubah Paket Harga: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah Paket Harga.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        try {
            $pricingPlan->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Paket Harga: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus Paket Harga.');
    }
}
