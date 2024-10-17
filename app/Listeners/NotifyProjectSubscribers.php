<?php

namespace App\Listeners;

use App\Events\Project\ProjectCreated;
use App\Models\User;
use App\Notifications\ProjectCreatedMentionedUserNotification;
use App\Notifications\ProjectCreatedNotification;
use App\Services\UserMentionService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyProjectSubscribers
{

    public function handle(ProjectCreated $event): void
    {
        $project = $event->project;
        $mentionedUsers = collect();

        // First handle notification for mentioned users
        if (UserMentionService::hasMentions($project->description)) {
            $mentionedUsers = UserMentionService::getUsersFromMentions($project->description, $project->id);

            $mentionedUsers->each(function (User $user) use ($project) {
                $user->notify(new ProjectCreatedMentionedUserNotification($project));
            });
        }

        // Now handle subscribed users
        $project
            ->users
            ->reject(fn (User $user) => $user->id === auth()->id())
            ->reject(fn (User $user) => $mentionedUsers->contains('id', $user->id))
            ->each(function (User $user) use ($event) {
                $user->notify(new ProjectCreatedNotification($event->project));
            });

    }
}
