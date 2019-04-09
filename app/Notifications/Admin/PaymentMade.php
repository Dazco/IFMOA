<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentMade extends Notification implements shouldQueue
{
    use Queueable;

    public $paymentFor;
    public $payer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($paymentFor, $payer)
    {
        //
        $this->paymentFor = $paymentFor;
        $this->payer = $payer;
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
        $payerName = $this->payer->name;
        return (new MailMessage)
            ->greeting("Hello $notifiable->name!")
            ->line("This is to inform you that a new payment for '$this->paymentFor' was made by '$payerName'.");
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
