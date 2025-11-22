<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (view()->exists('pages.contact')) {
        $view = 'pages.contact';
    } else {
        $view = 'contactit::contact';
    }

    route::view('/contact', $view, ['title' => 'Contact'])->name('contact');
});
