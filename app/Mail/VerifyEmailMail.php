<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class VerifyEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected mixed $notifiable, protected string $url){}

    /**
     * Build the message.
     */
    public function build(): VerifyEmailMail
    {
        return $this->subject('Vérification de l\'adresse e-mail')
            ->view('mails.verify-email', [
                'user' => $this->notifiable,
                'url' => $this->url
            ])->to($this->notifiable->email);
//        return (new MailMessage)
//            ->subject('Vérification de l\'adresse e-mail')
//            ->line('Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.')
//            ->action('Si vous n\'avez pas créé de compte, aucune action supplémentaire n\'est requise.', $this->url);
    }
}
