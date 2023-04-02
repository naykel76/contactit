<?php

namespace Naykel\Contactit\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Naykel\Contactit\Mail\MessageReceived;
use Naykel\Contactit\Mail\MessageSent;
use Naykel\Contactit\Rules\Recaptcha;

class Contact extends Component
{

    public $name, $email, $subject, $message, $recaptchaToken;

    public function submitForm()
    {
        $validatedData = $this->validate([
            // 'required|string|max:128',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'sometimes',
            'recaptchaToken' => ['required', new Recaptcha],
        ]);

        // admin email
        Mail::to(config('mail.from.address'))->send(new MessageReceived($validatedData));
        // user confirmation email
        Mail::to($validatedData['email'])->send(new MessageSent($validatedData));

        $this->dispatchBrowserEvent('notify', 'Your message has been sent successfully.');
        // reset form
        $this->reset();
    }

    public function render()
    {
        return view('contactit::components.contact-form');
    }
}
