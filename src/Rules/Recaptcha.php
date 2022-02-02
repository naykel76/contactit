<?php

namespace Naykel\Contactit\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha_secret_key'),
            'response' => $value
        ])->json();

        // $secret = env('RECAPTCHA_SECRET_KEY');
        // $response = Http::post("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$value")->json();

        if ($response['score'] < 0.5) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'Google thinks you are a bot, please refresh and try again';
    }
}
