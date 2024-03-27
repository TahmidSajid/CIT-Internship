<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function view(){
        return view('dashboard.profile');
    }
    public function profile_picture(Request $request){
        $request->file('profile_photo');

        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$request->file('profile_photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('profile_photo'))->resize(450,450);
        $image->save(('uploads/profile_photos/'.$new_name),quality:80);
        User::where('id',auth()->user()->id)->update([
            'photo' => $new_name,
        ]);
        return back();
    }
}
