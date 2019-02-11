<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    private $contact;

    /**
     * Create a new message instance.
     *
     * @param $contact
     */
    public function __construct($contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactForm')->with('contact',$this->contact)
            ->from($this->contact->email)
            ->replyTo($this->contact->email, $this->contact->nameAndSurname)
            ->subject($this->contact->nameAndSurname.' wysłał(-a) wiadomość - Bajer formularz kontaktowy');
    }
}
