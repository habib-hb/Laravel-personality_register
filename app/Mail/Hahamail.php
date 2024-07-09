<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Hahamail extends Mailable
{
    use Queueable, SerializesModels;

     // Public function available to the blade file
     public $data;
    public function __construct($data)
    {
        // Defining the data that will be passed to the blade file
        $this->data = $data;
    }



    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('780c56001@smtp-brevo.com', 'Habib-hb'),
            subject: 'Hahamail',
        );
    }



    public function content(): Content
    {
        return new Content(
            view: 'email.send-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
