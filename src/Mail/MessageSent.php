<?php

namespace Naykel\Contactit\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $enquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('Thank you for your message'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'contactit::emails.message-sent',
        );
    }
}
