<?php

namespace Naykel\Contactit\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $enquiry)
    {
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'contactit::emails.message-received',
        );
    }


}
