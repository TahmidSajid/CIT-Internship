<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $viewers = User::where('role','viewer')->count();
            $writters = User::where('role','writter')->count();
            $posts = Posts::count();
            $comments = Comments::count();
            $engagment = ($comments/$posts)*100;
            return view('dashboard.dashboard',compact('viewers','writters','posts','comments','engagment'));
        }
        else{
            Auth::logout();
            return back()->with('permission','You donot have permission to access');
        }
    }
}
