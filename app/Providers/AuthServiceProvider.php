<?php

namespace App\Providers;

use App\Models\FormOrder;
use App\Models\PricingPlan;
use App\Policies\FormOrderPolicy;
use App\Policies\PricingPlanPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        PricingPlan::class => PricingPlanPolicy::class,
        FormOrder::class => FormOrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
