<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use App\Models\Logos;
use App\Models\Socials;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function view()
    {
        $socials = Socials::all();
        $logo = Logos::first();
        $info = Informations::first();

        return view('dashboard.information', compact('socials', 'logo','info'));
    }

    public function add_social(Request $request)
    {
        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required',
            'social_icon' => 'required',
        ]);

        Socials::create($request->except('_token'));

        return back()->with('social_added', 'added successfully');
    }
    public function update_social(Request $request, $id)
    {

        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required',
            'social_icon' => 'required',
        ]);

        Socials::where('id', $id)->update([
            'social_name' => $request->social_name,
            'social_link' => $request->social_link,
            'social_icon' => $request->social_icon,
        ]);

        return back()->with('social_update', 'update successfully');
    }

    public function delete_social($id)
    {
        Socials::where('id', $id)->delete();

        return back()->with('social_delete', 'delete successfully');
    }

    public function add_logo(Request $request)
    {
        $request->validate([
            'logo' => 'required|file',
        ]);

        $logo_info = Logos::first();
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $request->file('logo')->getClientOriginalExtension();
        $image = $Image->read($request->file('logo'))->resize(120, 25);
        $image->save(('uploads/logos/' . $new_name), quality: 90);

        if ($logo_info == []) {
            $logo = Logos::create($request->except('_token'));
            Logos::where('id', $logo->id)->update([
                'logo' => $new_name,
            ]);
        } else {
            unlink('uploads/logos/' . $logo_info->logo);
            Logos::where('id', $logo_info->id)->update([
                'logo' => $new_name,
            ]);
        }
        return back()->with('logo_added', 'added successfully');
    }

    public function add_info(Request $request)
    {
        $info = Informations::first();

        if ($info == []) {
            Informations::create($request->except('_token'));
        } else {
            Informations::where('id', $info->id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
            ]);
        }

        return back()->with('Info_added', 'Info added successfully');
    }
}
