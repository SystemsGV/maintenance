<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\TaskGroup;
use App\Models\User;

class TaskGroupPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('crear grupo de tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TaskGroup $taskGroup, Project $project): bool
    {
        return $user->hasPermissionTo('editar grupo de tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TaskGroup $taskGroup, Project $project): bool
    {
        return $user->hasPermissionTo('archivar grupo de tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TaskGroup $taskGroup, Project $project): bool
    {
        return $user->hasPermissionTo('restaurar grupo de tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can reorder the model.
     */
    public function reorder(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('reordenar grupo de tarea') && $user->hasProjectAccess($project);
    }
}
