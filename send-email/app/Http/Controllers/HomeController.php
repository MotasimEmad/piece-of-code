<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function send_email(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $body = $request->body;

        Mail::to("motasimmax@gmail.com")
            ->send(new ContactUs($name, $email, $subject, $body));

        return back()->with(['status' => 'Email send successfully']);
    }
}
