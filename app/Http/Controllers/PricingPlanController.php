<?php

namespace App\Http\Controllers;

use App\DataTables\PricingPlanDataTable;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\PricingPlanDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PricingPlanDataTable $dataTable)
    {
        Gate::authorize('viewAny', PricingPlan::class);

        return $dataTable->render('admin.master.pricing_plan.index', [
            'pricing_plans' => PricingPlan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', PricingPlan::class);

        return view('admin.master.pricing_plan.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingPlan $pricingPlan)
    {
        Gate::authorize('update', $pricingPlan);

        return view('admin.master.pricing_plan.edit', [
            'pricingPlan' => $pricingPlan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        Gate::authorize('delete', $pricingPlan);

        try {
            $pricingPlan->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Paket Harga: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus Paket Harga.');
    }
}
