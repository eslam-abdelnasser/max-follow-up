<?php

namespace App\Http\Controllers;

use App\Models\ContactEmails;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function index()
    {


        return view('front.contact-us');
    }

    public function postMessage(Request $request)
    {

//        dd($request);
        $contact = new ContactEmails();
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->phone_number = $request->phone;
        $contact->email = $request->email;
        $contact->seen = '0';
        $contact->save();
        return redirect()->route('contact-us');


    }

    public function contactFooter(Request $request)
    {
        $contact = new ContactEmails();
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->seen = '0';
        $contact->save();
        return redirect()->back();

    }
}

