<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function Service() {
        $services = Services::latest()->get();
        return view('admin.service.index', compact('services'));
    }

    public function StoreService(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        Services::insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Service has been added successfully.');
    }

    public function Edit($id) {
        $services = Services::find($id);
        return view('admin.service.edit', compact('services'));
    }

    public function Update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        Services::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('home.services')->with('success', 'Service has been updated successfully.');
    }

    public function Delete($id) {
        Services::find($id)->delete();
        return Redirect()->back()->with('success', 'Your Service has been deleted successfully');
    }
}
