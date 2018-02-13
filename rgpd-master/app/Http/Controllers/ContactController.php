<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    
    /**
     * show the contact page
     */
    public function show()
    {
    	return view('contacts.show');
    }

    /**
     * [contact description]
     */
    public function contact(ContactRequest $request)
    {
    	//return new Contact($request->except('_token'));
    	
    	$to = explode('|',env('MAIL_TO_ADRESS'));
    	Mail::to($to)->send(new Contact($request->except('_token')));
    	return view('contacts.confirm');

    }
}
