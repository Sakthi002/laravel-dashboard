<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Models\Multipic;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function portfolioPage() {
        $images = Multipic::all();
        return view('client.portfolio.index', compact('images'));
    }

    public function servicesPage() {
        $services = Services::all();
        return view('client.services', compact('services'));
    }

    public function aboutPage() {
        $about = About::first();
        return view('client.about', compact('about'));
    }

    public function contactPage() {
        $contact = Contact::first();
        return view('client.contact.index', compact('contact'));
    }
    public function contactForm(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success','Form submitted successfully');
    }

}
