<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function login_view(){
        return view('frontend.user.login');
    }
    public function user_login(Request $request){
        return $request;
    }
}
