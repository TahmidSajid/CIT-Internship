<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryPostController extends Controller
{
    public function view($category_id,$category_name)
    {
        // *** Aside bar variables *** //
        $showcase_two = Categories::where('showcase','banner_two')->first();
        $banner_two = Posts::where('blog_category',$showcase_two->id)->get();


        $posts = Posts::where('blog_category',$category_id)->get();
        $category_name;


        return view('frontend.category_posts',compact('posts','category_name','banner_two','showcase_two'));
    }
}
