<?php

return [

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA (v3)
    |--------------------------------------------------------------------------
    | Set RECAPTCHA_SITE_KEY and RECAPTCHA_SECRET_KEY in .env, or publish
    | this config and customize. Fallback: config('services.recaptcha_*').
    */
    'recaptcha_site_key' => env('RECAPTCHA_SITE_KEY'),
    'recaptcha_secret_key' => env('RECAPTCHA_SECRET_KEY'),

    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA score threshold (0.0 - 1.0)
    |--------------------------------------------------------------------------
    | Submissions with score below this are rejected. Google recommends 0.5.
    */
    'recaptcha_score_threshold' => (float) env('RECAPTCHA_SCORE_THRESHOLD', 0.5),

    /*
    |--------------------------------------------------------------------------
    | Throttle: max contact submissions per IP per minute
    |--------------------------------------------------------------------------
    */
    'throttle_max_attempts' => (int) env('CONTACTIT_THROTTLE_ATTEMPTS', 5),
    'throttle_decay_minutes' => (int) env('CONTACTIT_THROTTLE_DECAY_MINUTES', 1),

    /*
    |--------------------------------------------------------------------------
    | Admin email (message received)
    |--------------------------------------------------------------------------
    | Defaults to config('mail.from.address'). Override with CONTACTIT_FROM_ADDRESS.
    */
    'mail_to' => env('CONTACTIT_MAIL_TO'),

];
