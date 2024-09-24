<?php

namespace App\Policies;

use App\Models\User;

class OwnerCompanyPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->can('ver mi empresa');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->can('editar mi empresa');
    }
}
