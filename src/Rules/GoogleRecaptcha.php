<?php

namespace Naykel\Contactit\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class GoogleRecaptcha implements Rule
{

    public function passes($attribute, $value)
    {
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => config('naykel.recaptcha.secret_key'),
                    'remoteip' => request()->getClientIp(),
                    'response' => $value
                ]
            ]
        );
        $body = json_decode((string) $response->getBody());
        return $body->success;
    }


    public function message()
    {
        return 'Are you a robot?';
    }
}
