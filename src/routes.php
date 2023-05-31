<?php

use Illuminate\Support\Facades\Route;

/**
 * condition is used to prevent route creation on applications where there is
 * no contact landing page.
 */
if (config('naykel.has_contact_page')) {

    Route::middleware(['web'])->group(function () {

        if (view()->exists('pages.contact')) {
            $view = 'pages.contact';
        } else {
            $view = 'contactit::contact';
        }

        route::view('/contact', $view, ['pageTitle' => 'Contact'])->name('contact');
    });
}
