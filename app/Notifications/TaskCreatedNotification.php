<?php

namespace App\Notifications;

use App\Enums\Queue;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Task $task) {}

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
                ->whereJsonContains('data->id', $this->task->id)
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
            ->subject("[{$this->task->project->name}] La tarea {$this->task->name} fue creada")
            ->greeting("{$this->task->createdByUser->name} creó una nueva tarea")
            ->action('Ver tarea', route('projects.tasks.open', ['project' => $this->task->project_id, 'task' => $this->task->id]))
            ->line($this->task->description);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'title' => "{$this->task->createdByUser->name} creó una nueva tarea",
            'subtitle' => "En la orden de trabajo \"{$this->task->project->name}\"",
            'link' => route('projects.tasks.open', [$this->task->project_id, $this->task->id]),
            'created_at' => $notifiable->created_at,
            'read_at' => $notifiable->read_at,
        ];
    }
}
