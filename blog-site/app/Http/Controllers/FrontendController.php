<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function view(){
        $latest = Posts::latest()->limit(4)->get();
        $features = Posts::where('blog_speciality','feature')->latest()->limit(1)->get();
        $editors_banner = Posts::where('blog_speciality','editor')->latest()->limit(1)->get();
        foreach ($editors_banner as $key => $value) {
            $e_id = $value->id;
        }
        $editors = Posts::where('blog_speciality','editor')->where('id','!=',$e_id)->get();
        $trend_banner_1 = Posts::where('blog_speciality','trending')->latest()->limit(1)->get();
        foreach ($trend_banner_1 as $key => $value) {
            $t_1 = $value->id;
        }
        $trend_banner_2 = Posts::where('blog_speciality','trending')->where('id','!=',$t_1)->latest()->limit(1)->get();
        foreach ($trend_banner_2 as $key => $value) {
            $t_2 = $value->id;
        }
        $trend_1 = Posts::where('blog_speciality','trending')->where('id','!=',$t_1)->where('id','!=',$t_2)->latest()->limit(2)->get();

        return view('frontend.index',compact('latest','features','editors_banner','editors','trend_banner_1','trend_banner_2','trend_1'));
    }
}
