<?php

namespace App\Notifications;

use App\Mail\VerifyEmailMail;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;

class VerifyEmail extends VerifyEmailNotification
{
    /**
     * Build the verification email message.
     *
     * @param  mixed  $notifiable
     * @return VerifyEmailMail
     */
    public function toMail(mixed $notifiable): VerifyEmailMail
    {
        $url = $this->verificationUrl($notifiable);

        return (new VerifyEmailMail($notifiable, $url))
            ->to($notifiable->email);
    }
}
