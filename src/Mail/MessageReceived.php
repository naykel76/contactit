<?php

namespace Naykel\Contactit\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message Received',
            from: new Address($this->enquiry['email'], $this->enquiry['name'])
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'contactit::emails.message-received',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
