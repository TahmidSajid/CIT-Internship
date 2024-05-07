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

        $notify_info = auth()->user()->notifications()->where('id',$id)->first();

        if ($notify_info->data['type'] == 'comment') {
            return redirect(route('post_view',$notify_info->data['blog_id']));
        }
        if ($notify_info->data['type'] == 'post') {
            return redirect(route('post_view',$notify_info->data['blog_id']));
        }
    }
}
