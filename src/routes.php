<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->group(function () {

    // check if local contact page or use package default
    if (view()->exists('pages.contact')) {
        $view = 'pages.contact';
    } else {
        $view = 'contactit::contact';
    }


    route::view('/contact', $view)->name('contact');
});



// use Illuminate\Support\Facades\Mail;
// use Naykel\ContactitController\Mail\MessageReceived;

// Route::get('test-mail', function(){
//     Mail::to('email@example.com')->send(new MessageReceived());
//     return new MessageReceived();
// });
