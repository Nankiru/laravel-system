<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function ContactUs(Request $request){
        return view('customerpage/contact');
        
    }
public function contact_submit(Request $request)
{
    if (!session()->has('id')) {
        return redirect()->back()->with('error', 'You need to log in first to submit the form.');
    }

    $validated = $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'messages' => 'required|string|max:1000',
    ]);

    // Here you can store message to DB or process it
    $message = new Message();
    $message->name = $request->fullname;
    $message->email = $request->email;
    $message->phone = $request->phone;
    $message->address = $request->address;
    $message->message = $request->messages;
    $message->created_at = now();

    $message->save();

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}


}
