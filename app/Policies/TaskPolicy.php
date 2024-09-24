<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('ver tareas') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('crear tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task, Project $project): bool
    {
        return $user->hasPermissionTo('editar tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task, Project $project): bool
    {
        return $user->hasPermissionTo('archivar tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task, Project $project): bool
    {
        return $user->hasPermissionTo('restaurar tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can reorder the model.
     */
    public function reorder(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('reordenar tarea') && $user->hasProjectAccess($project);
    }

    /**
     * Determine whether the user can complete the model.
     */
    public function complete(User $user, Project $project): bool
    {
        return $user->hasPermissionTo('completar tarea') && $user->hasProjectAccess($project);
    }
}
