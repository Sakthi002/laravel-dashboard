<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }

    public function create() {
        return view('admin.contact.create');
    }

    public function addContact(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
        ]);

        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contacts.admin')->with('success','Contact Profile added successfully');
    }

    public function edit($id) {

        $contact = Contact::find($id);

        return view('admin.contact.edit', compact('contact'));
    }

    public function updateContact(Request $request, $id) {

        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
        ]);

        Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('contacts.admin')->with('success','Contact Profile updated successfully');
    }

    public function deleteContact($id) {

        Contact::find($id)->delete();

        return redirect()->back()->with('success','Contact Profile deleted successfully');
    }

    public function contactMessages() {

        $messages = ContactForm::latest()->paginate(5);

        return view('admin.contact.messages', compact('messages'));
    }

    public function deleteContactMessage($id) {

        ContactForm::find($id)->delete();

        return redirect()->back()->with('success','Contact Message deleted successfully');

    }

}
