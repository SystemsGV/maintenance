<?php

namespace App\Notifications;

use App\Enums\Queue;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectCreatedMentionedUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Project $project) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Determine the notification's delivery delay.
     *
     * @return array<string, \Illuminate\Support\Carbon>
     */
    public function withDelay(object $notifiable): array
    {
        return [
            'mail' => now()->addMinutes(5),
        ];
    }

    /**
     * Determine which queues should be used for each notification channel.
     *
     * @return array<string, string>
     */
    public function viaQueues(): array
    {
        return [
            'mail' => Queue::EMAIL->value,
        ];
    }

    /**
     * Determine if the notification should be sent.
     */
    public function shouldSend(object $notifiable, string $channel): bool
    {
        if ($channel === 'mail') {
            return $notifiable
                ->unreadNotifications()
                ->whereJsonContains('data->id', $this->project->id)
                ->exists();
        }

        return true;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("[{$this->project->name}] Fuiste mencionado en una nueva orden de trabajo \"{$this->project->name}\"")
            ->greeting("{$this->project->createdByUser->name} te ha mencionado en una nueva orden de trabajo \"{$this->project->name}\"")
            ->action('Ver orden de trabajo', route('projects.kanban.open', ['project' => $this->project->id]))
            ->line($this->project->description);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'project_id' => $this->project->id,
            'title' => "{$this->project->userGenerate->name} te ha mencionado en una nueva orden de trabajo \"{$this->project->name}\"",
            'subtitle' => "En la orden de trabajo \"{$this->project->name}\"",
            'link' => route('projects.kanban.open', [$this->project->id]),
            'created_at' => $notifiable->created_at,
            'read_at' => $notifiable->read_at,
        ];
    }
}
