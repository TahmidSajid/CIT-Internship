<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactUs;
use App\Models\User;
use App\Notifications\ContactMailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function view()
    {
        return view('frontend.contact');
    }
    public function contact_form(Request $request)
    {
        // return $request;

        $email = ContactUs::create($request->except("_token"));

        Mail::to($request->email)->send(new ContactMail($request->except('email')));

        $admins = User::where('role','admin')->get();

        foreach ($admins as $key => $admin) {
            Notification::send($admin,new ContactMailNotification($email));
        }


        return back()->with('message_sent', 'Email sent to admin');
    }
}
