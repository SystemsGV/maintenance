<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\TimeLog;
use App\Models\User;

class TimeLogPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('agregar registro de tiempo') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TimeLog $timeLog, Project $project): bool
    {
        return $user->hasPermissionTo('eliminar registro de tiempo') && $user->hasProjectAccess($project);
    }
}
