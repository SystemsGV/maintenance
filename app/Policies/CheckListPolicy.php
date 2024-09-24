<?php

namespace App\Policies;

use App\Models\CheckList;
use App\Models\User;

class CheckListPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('ver checklists');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('crear checklist');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('editar checklist');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('archivar checklist');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CheckList $checkList): bool
    {
        return $user->hasPermissionTo('restaurar checklist');
    }
}
