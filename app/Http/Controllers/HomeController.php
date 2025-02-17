<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only('email', 'subject', 'message');

        Mail::send([], [], function ($message) use ($data) {
            $message->to('ikmalfairuz08@gmail.com')
                ->subject($data['subject'])
                ->text('Message from: ' . $data['email'] . "\n\n" . $data['message']);
        });        

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
