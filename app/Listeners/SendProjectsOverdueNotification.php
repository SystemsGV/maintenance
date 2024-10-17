<?php

namespace App\Listeners;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectsOverdueNotification;
use App\Services\PermissionService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SendProjectsOverdueNotification
{
    use InteractsWithQueue;

    public function handle(Login $event)
    {
        if(Auth::check()){
            $user = User::find($event->user->id);
            $projectIds = PermissionService::projectsThatUserCanAccess($event->user)->pluck('id');
            $projectsOverdue = Project::whereIn('id', $projectIds)
                                ->where('default', 1)
                                ->whereIn('period_id', [2, 3, 4, 5])
                                ->whereIn('due_on', [
                                        Carbon::now()->subDays(3)->format('Y-m-d'),
                                        Carbon::now()->subDays(2)->format('Y-m-d'),
                                        Carbon::now()->subDays(1)->format('Y-m-d'),
                                        Carbon::now()->format('Y-m-d'),
                                    ])
                                ->get(['id', 'name', 'due_on']);

            if(!$projectsOverdue->isEmpty() && $user->isAdmin()){
                $message = "Órdenes de trabajo a punto de vencer:";
                foreach ($projectsOverdue as $project) {
                    $message .= " - {$project['name']} (Fecha de vencimiento: {$project['due_on']})";
                }
                $user->notify(new ProjectsOverdueNotification($message));
            }

        }
    }
}
