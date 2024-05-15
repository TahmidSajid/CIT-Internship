<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $contactUs = ContactUs::all();

       return view('dashboard.contact.contact_list' , compact('contactUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact =  ContactUs::find($id);

        return view('dashboard.contact.contact_single_view',compact("contact"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ContactUs::where('id',$id)->delete();

        $users = User::all();
        foreach ($users as $key => $user) {
            $user->notifications()->where("data->contact_id",$id)->delete();
        }
        return redirect(route('contactUs.index'))->with('delete','Message deleted');
    }
}
