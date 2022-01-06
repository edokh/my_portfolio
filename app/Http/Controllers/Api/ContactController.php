<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(ContactRequest $request)
    {
        Log::info($request);
        $details = $request->validated();
        Mail::to('eido.khudyda@gmail.com')->send(new ContactMail($details));

        return response()->json('Your message has been sent. Thank you!', 200);
    }
}
