<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentNotification extends Notification
{
    use Queueable;

    public $blog, $commenter , $comment_on , $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($a,$b,$c,$d)
    {
        $this->blog = $a;
        $this->commenter = $b;
        $this->comment_on = $c;
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
            'blog_title' => $this->blog['blog_title'],
            'blog_id' => $this->blog['id'],
            'type' => $this->type,
            'title' => $this->commenter." ".'commented on'." ".$this->comment_on." ".'post',
        ];
    }
}
