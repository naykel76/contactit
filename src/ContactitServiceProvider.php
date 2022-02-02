<?php

namespace Naykel\Contactit;

use Illuminate\Support\ServiceProvider;
use Naykel\Contactit\Http\Livewire\Contact;
use Livewire\Livewire;

class ContactitServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contactit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        Livewire::component('contact', Contact::class);

        /** Publish Views (optional)
         * ==================================================================
         *
         */
        $this->publishes(
            [
                __DIR__ . '/../resources/views/pages' => resource_path('views/pages'),
            ],
            'contactit-views'
        );
    }
}
