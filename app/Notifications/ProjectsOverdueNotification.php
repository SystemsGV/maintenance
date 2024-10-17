<?php

namespace App\Notifications;

use App\Enums\Queue;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ProjectsOverdueNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $data)
    {
        $this->onQueue(Queue::EMAIL->value);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('¡Atención! Órdenes de trabajo a punto de vencer')
            ->greeting("Hola {$notifiable->getFirstName()}, tenemos una actualización importante!")
            ->line('Estas son las órdenes de trabajo que están a punto de vencer:')
            ->line($this->data)
            ->salutation('No olvidar!');
    }
}
