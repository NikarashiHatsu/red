<?php

namespace App\Policies;

use App\Models\FormOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormOrder  $formOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FormOrder $formOrder)
    {
        return $user->role == 'admin' || $user->id == $formOrder->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FormOrder  $formOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FormOrder $formOrder)
    {
        return $user->role == 'admin' || $user->id == $formOrder->user_id;
    }
}
