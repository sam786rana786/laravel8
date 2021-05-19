<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function Portfolio() {
        $multipics = DB::table('multipics')->get();
        return view('pages.portfolio', compact('multipics'));
    }

    public function Contact() {
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success', 'Your Message has been sent. Thank You!');
    }
}
