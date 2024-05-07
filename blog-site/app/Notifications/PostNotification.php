<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    public $name , $photo , $id, $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($a,$b,$c,$d)
    {
        $this->name = $a;
        $this->photo = $b;
        $this->id = $c;
        $this->type = $d;
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
            'blog_id' => $this->id,
            'blog_title' => $this->name,
            'user_photo' => $this->photo,
            'type' => $this->type,
            'title' => 'Posted a new blog',
        ];
    }
}
