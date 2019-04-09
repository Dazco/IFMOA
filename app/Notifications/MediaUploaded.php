<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MediaUploaded extends Notification implements shouldQueue
{
    use Queueable;

    public $media;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($media)
    {
        //
        $this->media = $media;
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
        $title = $this->media->title;
        return (new MailMessage)
            ->greeting("A new Media '$title' has been uploaded to the site")
            ->line('You can view the media in the site\'s gallery.')
            ->action('Gallery', route('gallery'));
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