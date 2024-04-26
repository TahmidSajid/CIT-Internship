<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Categories;

class CategoryPostController extends Controller
{
    public function view($category_id,$category_name)
    {

        $posts = Posts::where('blog_category',$category_id)->paginate(10);
        $category_name;

        // *** Aside bar variables *** //
        $showcase_two = Categories::where('showcase','banner_two')->first();
        $banner_two = Posts::where('blog_category',$showcase_two->id)->get();
        $categories = Categories::latest()->limit(5)->get();
        $recent_posts = Posts::latest()->limit(4)->get();
        $popular_posts = Comments::select('blog_id')->distinct()->latest()->limit(4)->get();

        return view('frontend.category_posts',compact('posts','category_name','banner_two','showcase_two','showcase_two','banner_two','categories','recent_posts','popular_posts'));
    }
}
