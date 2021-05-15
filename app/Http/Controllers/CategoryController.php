<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        // $categories = DB::table('categories')
        //             ->join('users', 'categories.user_id', 'users.id')
        //             ->select('categories.*', 'users.name')
        //             ->latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    public function AddCat(Request $request){
        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Should be less than 255 Characters.',
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->uiser_id = Auth::user()->id;
        // $category->save();

        // return redirect('/category/all');

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Added Successfully');
    }
    public function Edit($id){
        $categories = Category::find($id);
        // $catagoriess = DB::table('catagories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->where('id', $id)->update($data)
        return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function SoftDelete($id) {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Added to Trash Successfully');
    }

    public function Restore($id) {
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restored Successfully');
    }

    public function Pdelete($id) {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
