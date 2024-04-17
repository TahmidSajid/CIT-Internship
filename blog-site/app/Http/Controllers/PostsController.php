<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.post.post_form');
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
        $request->validate([
            'blog_title' => 'required',
            'blog_photo' => 'required',
            'category' => 'required',
            'blog' => 'required',
        ]);


        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $request->file('blog_photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('blog_photo'))->resize(720, 580);
        $image->save(('uploads/blog_photos/' . $new_name), quality: 90);

        Posts::insert([
            'user_id' => auth()->user()->id,
            'blog_title' => $request->blog_title,
            'blog_photo' => $new_name,
            'blog_category' =>  $request->category,
            'blog' =>  $request->blog,
            'created_at' => Carbon::now(),
        ]);

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        return view('frontend.post.post_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'blog_title' => 'required',
            'category' => 'required',
            'blog' => 'required',
        ]);


        Posts::where('id', $post->id)->update([
            'blog_title' => $request->blog_title,
            'blog_category' =>  $request->category,
            'blog' =>  $request->blog,
            'updated_at' => Carbon::now(),
        ]);

        if ($request->hasFile('blog_photo')) {
            unlink('uploads/blog_photos/'.$post->blog_photo);
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $request->file('blog_photo')->getClientOriginalExtension();
            $image = $Image->read($request->file('blog_photo'))->resize(720, 580);
            $image->save(('uploads/blog_photos/' . $new_name), quality: 90);
            Posts::where('id', $post->id)->update([
                'blog_photo' => $new_name,
            ]);
        }
        return redirect(route('post_view',$post->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        unlink('uploads/blog_photos/'.$post->blog_photo);
        Posts::where('id',$post->id)->delete();
        return redirect(route('index'));
    }

    public function single_view($id)
    {
        $post = Posts::where('id', $id)->first();
        return view('frontend.post.post_view', compact('post'));
    }
}
