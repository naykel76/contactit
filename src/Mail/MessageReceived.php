<?php

namespace Naykel\Contactit\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;


    public $enquiry;

    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build message and send confirmation to admin
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->enquiry['email'])->markdown('contactit::emails.message-received');
    }
}
