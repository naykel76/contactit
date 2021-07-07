<?php

use Illuminate\Support\Facades\Route;
use Naykel\Contactit\Controllers\ContactitController;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::middleware(['web'])->group(function () {
    route::get('/contact', [ContactitController::class, 'index'])->name('contact');
    route::post('/contact/store', [ContactitController::class, 'store'])->name('contact.store')->middleware(ProtectAgainstSpam::class);
});

// use Illuminate\Support\Facades\Mail;
// use Naykel\ContactitController\Mail\MessageReceived;

// Route::get('test-mail', function(){
//     Mail::to('email@example.com')->send(new MessageReceived());
//     return new MessageReceived();
// });
