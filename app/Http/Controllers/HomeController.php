<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone_number' => 'required|string|max:15', 
            'message' => 'required|string',
        ]);
        

        $data = $request->only('email', 'phone_number', 'message');

        Mail::send([], [], function ($message) use ($data) {
            $message->to('ikmalfairuz08@gmail.com')
                ->subject('New Contact Form Submission')
                ->text("Message from: " . $data['email'] . "\nPhone Number: " . $data['phone_number'] . "\n\nMessage:\n" . $data['message']);
        });
        
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
