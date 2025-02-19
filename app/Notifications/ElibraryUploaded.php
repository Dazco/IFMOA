<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ElibraryUploaded extends Notification implements shouldQueue
{
    use Queueable;

    public $elibrary;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($elibrary)
    {
        //
        $this->elibrary = $elibrary;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $title = $this->elibrary->title;
        return (new MailMessage)
            ->greeting("A new Elibrary resource '$title' has been uploade to the site")
            ->line('Login to your portal to view this resource.')
            ->action('Login', route('login'));
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
            //
        ];
    }
}
