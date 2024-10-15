<?php

namespace App\Listeners;

use App\Events\Project\ProjectCreated;
use App\Events\Task\CommentCreated;
use App\Events\Task\TaskCreated;
use App\Models\User;
use App\Notifications\CommentCreatedMentionedUserNotification;
use App\Notifications\CommentCreatedNotification;
use App\Notifications\ProjectCreatedMentionedUserNotification;
use App\Notifications\ProjectCreatedNotification;
use App\Notifications\TaskCreatedMentionedUserNotification;
use App\Notifications\TaskCreatedNotification;
use App\Services\UserMentionService;

class NotifyProjectSubscribers
{
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if ($event instanceof ProjectCreated) {
            $this->handleCreatedProject($event);
        }
    }

    protected function handleCreatedProject($event): void
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
