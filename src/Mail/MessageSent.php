<?php

namespace Naykel\Contactit\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build and send confirmation message to the user confirming message received
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contactit::emails.message-sent');
    }
}
