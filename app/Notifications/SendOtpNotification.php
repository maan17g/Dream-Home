<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendOtpNotification extends Notification
{
    use Queueable;

    protected $otp;

    public function __construct($otp,)
    {
        $this->otp = $otp; // Stores the 6-digit code
        }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Verify Your Account Registration')
        ->greeting('Hello!')
        ->view('auth.email-template',['code'=>$this->otp]);
            // ->line('Please use the security code below to complete your account registration setup:')
            // ->line('**' . $this->otp . '**')
            // ->line('This code will expire in 10 minutes.');
    

    }
}
