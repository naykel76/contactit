<?php

namespace Naykel\Contactit;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Naykel\Contactit\Http\Livewire\Contact;

class ContactitServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/contactit.php', 'contactit');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'contactit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        Livewire::component('contact', Contact::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/contactit.php' => config_path('contactit.php'),
            ], 'contactit-config');

            $this->publishes([
                __DIR__ . '/../resources/views/contact.blade.php' => resource_path('views/pages/contact.blade.php'),
            ], 'contactit-views');
        }
    }
}
