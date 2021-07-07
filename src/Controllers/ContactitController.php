<?php

namespace Naykel\Contactit\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Naykel\Contactit\Rules\GoogleRecaptcha;
use Naykel\Contactit\Mail\MessageReceived;
use Naykel\Contactit\Mail\MessageSent;


class ContactitController extends Controller
{

    /**
     * Displays the contact form
     */
    public function index()
    {
        // if local template exists then use, else use package layout
        return view(View::exists('pages.contact') ? 'pages.contact' : 'contactit::pages.contact')
            ->with('title', 'Contact Us');
    }

    /**
     * Submit the contact form
     */
    public function store(Request $request)
    {

        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
            'g-recaptcha-response' => ['required', new GoogleRecaptcha],
        ]);

        $enquiry = $validatedData;

        // use env mail from because in this case it is the address to send to
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MessageReceived($enquiry));
        // Send reply to user ($enquiry->email is the user email address)
        Mail::to($enquiry['email'])->send(new MessageSent($enquiry));

        session()->flash('flash', 'Thank you, your message has been sent successfully.');
        return redirect('/');
    }
}
