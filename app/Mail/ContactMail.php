<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public array $request){}


    /**
     * Build the message.
     */
    public function build(): ContactMail
    {
        return $this->subject($this->request['subject'])
            ->view('mails.contact', [
                'contact_name' => $this->request['name'],
                'contact_email' => $this->request['email'],
                'contact_subject' => $this->request['subject'],
                'contact_message' => $this->request['message'],
            ])->to(config('mail.from.receiver'));
    }
}
