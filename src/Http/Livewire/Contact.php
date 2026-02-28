<?php

namespace Naykel\Contactit\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Naykel\Contactit\Mail\MessageReceived;
use Naykel\Contactit\Mail\MessageSent;
use Naykel\Contactit\Rules\Recaptcha;

class Contact extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public string $recaptchaToken = '';

    /** Honeypot: must stay empty (bots often fill it). */
    public string $website = '';

    public function submitForm(): void
    {
        if (! empty(trim($this->website))) {
            throw ValidationException::withMessages([
                'website' => ['Invalid submission.'],
            ]);
        }

        $throttleKey = 'contact:' . request()->ip();
        $maxAttempts = config('contactit.throttle_max_attempts', 5);
        $decayMinutes = config('contactit.throttle_decay_minutes', 1);

        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => [__('Please try again in :seconds seconds.', ['seconds' => $seconds])],
            ]);
        }

        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'recaptchaToken' => ['required', 'string', new Recaptcha],
        ]);

        $mailTo = config('contactit.mail_to') ?? config('mail.from.address');
        $enquiry = collect($validatedData)->except('recaptchaToken')->all();

        Mail::to($mailTo)->send(new MessageReceived($enquiry));
        Mail::to($validatedData['email'])->send(new MessageSent($enquiry));

        RateLimiter::hit($throttleKey, $decayMinutes * 60);

        $this->dispatch('notify', 'Your message has been sent successfully.');
        $this->reset(['name', 'email', 'subject', 'message', 'recaptchaToken', 'website']);
    }

    public function render()
    {
        return view('contactit::components.contact-form');
    }
}
