<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInternship extends Notification
{
    use Queueable;
    private $internship;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($internship)
    {
        $this->internship = $internship;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("Hi there!")
                    ->line("A new internship has been posted")
                    ->action('Check the internship', url('/'))
                    ->line('Thank you for using Findit!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'internship_id' => $this->internship->id,
            'internship_title' => $this->internship->title
        ];
    }
}
