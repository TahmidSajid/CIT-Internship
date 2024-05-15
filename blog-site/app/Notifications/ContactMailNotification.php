<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactMailNotification extends Notification
{
    use Queueable;

    public $email_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($x)
    {
        $this->email_id = $x->id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'contact_id' => $this->email_id,
            'blog_title' => 'Mail',
            'type' => 'mail',
            'title' => 'You have a new message',
        ];
    }
}
