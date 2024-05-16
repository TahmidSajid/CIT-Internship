<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function view()
    {
        return view('dashboard.information');
    }
}
