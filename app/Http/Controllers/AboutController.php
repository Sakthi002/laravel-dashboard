<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index(){

        $about_list = About::latest()->paginate(5);

        return view('admin.about.index',compact('about_list'));
    }

    public function create(){

        return view('admin.about.create');
    }

    public function edit($id){

        $about = About::find($id);

        return view('admin.about.edit',compact('about'));
    }

    public function addAbout(Request $request) {

        $request->validate([
           'title' => 'required|min:4:max:100',
           'short_desc' => 'required|max:255',
           'long_desc' => 'required',
        ]);

        $about = new About();

        $about['title'] = $request->title;
        $about['short_desc'] = $request->short_desc;
        $about['long_desc'] = $request->long_desc;
        $about['created_at'] = Carbon::now();

        $about->save();

        return redirect()->route('about.all')->with('success','About added successfully.');
    }

    public function updateAbout(Request $request, $id) {

        $request->validate([
            'title' => 'required|min:4:max:100',
            'short_desc' => 'required|max:255',
            'long_desc' => 'required',
        ]);

        About::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('about.all')->with('success','About updated successfully.');
    }

    public function deleteAbout($id) {

        About::find($id)->delete();

        return redirect()->back()->with('success','About deleted successfully.');
    }
}
