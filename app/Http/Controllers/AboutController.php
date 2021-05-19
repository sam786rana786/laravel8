<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function About() {
        $about = HomeAbout::latest()->get();
        return view('admin.about.index', compact('about'));
    }

    public function AddAbout() {
        return view('admin.about.addabout');
    }

    public function StoreAbout(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);
        HomeAbout::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('home.about')->with('success', 'About Section Added Successfully');
    }

    public function Edit($id) {
        $about = HomeAbout::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function Update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->route('home.about')->with('success', 'About Section Updated Successfully');
    }

    public function Delete($id) {
        HomeAbout::find($id)->delete();
        return Redirect()->route('home.about')->with('success', 'About Section Deleted Successfully');
    }
}
