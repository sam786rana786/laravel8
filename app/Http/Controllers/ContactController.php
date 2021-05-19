<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function Contact() {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function StoreContact(Request $request) {
        $this->validate($request,[
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Contact Added Successfully');
    }

    public function Edit($id) {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function Update(Request $request, $id) {
        $this->validate($request, [
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Details updated successfully');
    }

    public function Delete($id){
        Contact::find($id)->delete();
        return redirect('admin.contact')->with('success', 'Contact deleted successfully');
    }

    public function ContactForm() {
        $contacts = ContactForm::all();
        return view('admin.contact.contact_message', compact('contacts'));
    }
}
