<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view ('contact_us');
    }
    public function sendEmail(Request $request){
        $details=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'message'=>$request->message,

        ];
        Mail ::to ('efatkhadr1982@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', 'your message sent succssefully');
      // dd('sent');
    }
}
