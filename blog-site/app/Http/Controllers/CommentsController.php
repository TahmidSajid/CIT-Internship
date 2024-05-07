<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Notifications\CommentReplyNotification;
use Illuminate\Support\Facades\Notification;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $comment = Comments::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);

        $blog = Posts::where('id',$comment->blog_id)->first();

        $admin = User::where('role','admin')->first();

        if ($comment->parent_id) {
            $parent_info = Comments::where('parent_id',$comment->parent_id)->first();
            Notification::send($admin,new CommentReplyNotification($blog,$comment->getUser->name,$parent_info->getUser->name,'comment'));
            Notification::send($blog->getUser,new CommentReplyNotification($blog,$comment->getUser->name,'your','comment'));
        }
        else{
            Notification::send($admin,new CommentNotification($blog,$comment->getUser->name,$blog->getUser->name,'comment'));
            Notification::send($blog->getUser,new CommentNotification($blog,$comment->getUser->name,'your','comment'));
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
