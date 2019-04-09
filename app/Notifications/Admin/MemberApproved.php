<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MemberApproved extends Notification implements shouldQueue
{
    use Queueable;

    public $member;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        //
        $this->member = $member;
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
        return (new MailMessage)
            ->greeting("Hello $notifiable->name!")
            ->line("A new member '$this->member->name' has been approved and is now a valid member of IFMOA.")
            ->line("The member has been notified to pay the required registration fees within 1 week of approval. If he/she fails to do so, please go ahead and mark the member inactive to terminate his membership.")
            ->line("Note, this can still be reversed by any member upon reconsideration")
            ->line("You can login to your member's portal through the site or via this button.")
            ->action('Member Login', url('/login'));
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
