<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected User $user, protected string $token){}

    /**
     * Build the message.
     */
    public function build(): ResetPasswordMail
    {
        return $this->subject('Reset Password Notification')
            ->view('mails.reset-password', [
                'user' => $this->user,
                'token' => $this->token,
            ])->to($this->user->email);
    }
}
