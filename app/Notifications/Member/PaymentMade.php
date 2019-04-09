<?php

namespace App\Notifications\Member;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentMade extends Notification implements shouldQueue
{
    use Queueable;

    public $paymentFor;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($paymentFor)
    {
        //
        $this->paymentFor = $paymentFor;
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
                    ->line("This is to confirm that your recent payment for '$this->paymentFor' was successful.")
                    ->line('You can view your current financial status in your members portal!')
                    ->action('Financial Status', url('/member/payments'));
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
