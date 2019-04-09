<?php

namespace App\Notifications\Member;

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
        $password = strtoupper($notifiable->surname);
        return (new MailMessage)
                    ->greeting("Hello $notifiable->name!")
                    ->line('We are glad to inform you that your application has been approved and you are now a valid member of IFMOA.')
                    ->line("Your login details are:")
                    ->line("Registration Number: $notifiable->registration_number")
                    ->line("Password: $password")
                    ->line("You are advised to change your password immediately for security reasons.")
                    ->line("You are required to pay the registration fee within 1 week of approval, failure to do so will result in forfeiture of approval and termination of membership.")
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
