<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectUpdated;
use App\Events\Task\TaskUpdated;
use App\Models\Project;
use App\Models\Task;

class UpdateProject
{
    public function update(Project $project, array $data): void
    {
        $updateField = key($data);

        if (! in_array($updateField, ['users', 'labels', 'tasks'])) {

            $project->update($data);
            if ($updateField === 'group_id') {
                $project->update(['order_column' => 0]);
            }
        }

        if ($updateField === 'tasks') {
            $tasks = $data['tasks'];
            foreach($tasks as $task){
                $newTask = Task::find($task['id']);
                $newTask->group_id = 2;
                $newTask->labels()->sync(2);
                $newTask->check = $task['check'];
                $newTask->save();
            }
            return response()->json();
        }

        if ($updateField === 'users') {
            $project->users()->sync($data['users']);
        }

        if ($updateField === 'labels') {
            $project->labels()->sync($data['labels']);
        }

        ProjectUpdated::dispatch($project, $updateField);

    }
}
