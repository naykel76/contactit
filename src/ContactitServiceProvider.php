<?php

namespace Naykel\Contactit;

use Illuminate\Support\ServiceProvider;
use Naykel\Contactit\View\Components\Contact;

class ContactitServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contactit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewComponentsAs('contactit', [
            Contact::class,
        ]);

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
