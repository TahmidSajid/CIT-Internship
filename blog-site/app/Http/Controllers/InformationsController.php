<?php

namespace App\Http\Controllers;

use App\Models\Socials;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function view()
    {
        $socials = Socials::all();

        return view('dashboard.information',compact('socials'));
    }

    public function add_social(Request $request)
    {
        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required',
            'social_icon' => 'required',
        ]);

        Socials::create($request->except('_token'));

        return back();
    }
}
