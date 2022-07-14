<?php

use Illuminate\Support\Facades\Route;


// condition is used to prevent route creation on applications
// where there is no contact landing page. For example a spa with
// contact component on the front page.
if (config('naykel.has_contact_page')) {

    Route::middleware(['web'])->group(function () {

        // check if local contact page or use package default
        if (view()->exists('pages.contact')) {
            $view = 'pages.contact';
        } else {
            $view = 'contactit::contact';
        }

        route::view('/contact', $view)->name('contact');
    });
}
