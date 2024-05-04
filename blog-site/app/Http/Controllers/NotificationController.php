<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    public function view($id)
    {
        auth()->user()->notifications()->where('id',$id)->update([
            'read_at' => Carbon::now(),
        ]);

        return redirect(route('post_view',auth()->user()->notifications()->where('id',$id)->first()->data['blog_id']));
    }
}
