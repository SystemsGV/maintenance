<?php

namespace App\Policies;

use App\Models\ClientCompany;
use App\Models\User;

class ClientCompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('ver empresas cliente');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('crear empresa cliente');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientCompany $model): bool
    {
        return $user->hasPermissionTo('editar empresa cliente');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientCompany $model): bool
    {
        return $user->hasPermissionTo('archivar empresa cliente');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientCompany $model): bool
    {
        return $user->hasPermissionTo('restaurar empresa cliente');
    }
}
