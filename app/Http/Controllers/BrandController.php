<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function AllBrand() {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function AddBrand(Request $request) {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input brand Name',
            'brand_name.min' => 'Please Insert atleast 4 characters.',
            'brand_image.mimes' => 'Please Insert PNG, JPG or JPEG Image.',
        ]);

        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid()). '.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'. $name_gen);
        $last_img = 'image/brand/'.$name_gen;

        // $image_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen. '.' .$image_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        // $brand = new brand;
        // $brand->brand_name = $request->brand_name;
        // $brand->uiser_id = Auth::user()->id;
        // $brand->save();

        // return redirect('/brand/all');

        // $data = array();
        // $data['brand_name'] = $request->brand_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('brands')->insert($data);

        return Redirect()->back()->with('success', 'Brand Added Successfully');
    }
    public function Edit($id) {
        $brands = Brand::find($id);
        // // $brands = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id) {
        $validateData = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please Input brand Name',
            'brand_name.min' => 'Please Insert atleast 4 characters.',
        ]);
        // unlink the old image
        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_gen = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen. '.' .$image_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success', 'Brand Updated Successfully');
        }
        else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success', 'Brand Updated Successfully');
        }

    }

    public function Delete($id) {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand Deleted Successfully');
    }

    /// This is for multi pictures upload all method
    public function Multipic() {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function AddImage(Request $request) {
        $image = $request->file('image');
        foreach($image as $m_image) {
            $name_gen = hexdec(uniqid()).'.'.$m_image->getClientOriginalExtension();
            Image::make($m_image)->resize(300,200)->save('image/multi/'. $name_gen);
            $last_image = 'image/multi/'. $name_gen;
            Multipic::insert([
                'image' => $last_image,
                'created_at' => Carbon::now(),
            ]);
        }
        //end of foreach
        return Redirect()->back()->with('success', 'Images Uploaded successfully');
    }
}
