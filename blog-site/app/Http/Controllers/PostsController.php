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
            'blog_title' =>'required',
            'blog_photo' =>'required',
            'category' =>'required',
            'blog'=> 'required',
        ]);


        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$request->file('blog_photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('blog_photo'))->resize(720,580);
        $image->save(('uploads/blog_photos/'.$new_name),quality:90);

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
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
