<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactRequest $request) {
        Mail::to('kontakt@bajer.io')->send(new ContactForm($request));
        return \response()->json(['status'=>'success',
            'message'=>'Email został wysłany'
        ], 200);

    }
}
