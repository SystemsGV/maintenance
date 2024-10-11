<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectUpdated;
use App\Events\Task\TaskUpdated;
use App\Models\Project;
use App\Models\Task;

class UpdateProject
{
    public function update(Project $project, array $data): bool
    {
        $data['rate'] *= 100;
        $data['client_company_id'] = 1;
        $project->users()->sync($data['users']);
        return $project->update($data);
    }
}
