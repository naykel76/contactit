<?php

namespace Naykel\Contactit\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('contactit.recaptcha_secret_key') ?? config('services.recaptcha_secret_key');

        if (empty($secret)) {
            $fail('reCAPTCHA is not configured.');

            return;
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $value,
        ])->json();

        $success = ($response['success'] ?? false) === true;
        $score = (float) ($response['score'] ?? 0);
        $threshold = (float) config('contactit.recaptcha_score_threshold', 0.5);

        if (! $success || $score < $threshold) {
            $fail(__('Google thinks you are a bot, please refresh and try again.'));
        }
    }
}
