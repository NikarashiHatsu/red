<?php

namespace App\Policies;

use App\Models\PricingPlan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricingPlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PricingPlan $pricingPlan)
    {
        return $user->role == 'admin' && $user->id == $pricingPlan->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PricingPlan $pricingPlan)
    {
        return $user->role == 'admin' && $user->id == $pricingPlan->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PricingPlan $pricingPlan)
    {
        return $user->role == 'admin' && $user->id == $pricingPlan->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PricingPlan  $pricingPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PricingPlan $pricingPlan)
    {
        return $user->role == 'admin' && $user->id == $pricingPlan->user_id;
    }
}
