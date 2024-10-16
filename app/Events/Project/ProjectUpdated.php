<?php

namespace App\Events\Project;

use App\Models\Project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Project $project;

    public int $projectId;

    public string $property;

    public mixed $value;

    /**
     * Create a new event instance.
     */
    public function __construct(Project $project, string $updateField,) {
        $this->project = $project->loadDefault();

        $this->projectId = $project->id;
        $this->property = $updateField;
        $this->value = $this->project->toArray()[$updateField];

        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("App.Models.Project.{$this->project->id}"),
        ];
    }
}
