<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function view(){
        $latest = Posts::latest()->limit(4)->get();
        return view('frontend.index',compact('latest'));
    }
}
