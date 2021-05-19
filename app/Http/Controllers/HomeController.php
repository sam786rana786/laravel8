<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function HomeSlider() {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider() {
        return view('admin.slider.addslider');
    }

    public function StoreSlider(Request $request) {
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1920,1088)->save('image/slider/'. $name_gen);
        $last_img = 'image/slider/'.$name_gen;
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('home.slider')->with('success', 'Slider Added Successfully');
    }

    public function Edit($id) {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }

    public function Update(Request $request, $id) {
        // unlink the old image
        $old_image = $request->old_image;

        $image = $request->file('image');
        if($image){
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1088)->save('image/slider/'. $name_gen);
            $last_img = 'image/slider/'.$name_gen;

            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
        else{
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success', 'Slider Updated Successfully');
        }
    }

    public function Delete($id) {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success', 'Slider Deleted Successfully');
    }
}
