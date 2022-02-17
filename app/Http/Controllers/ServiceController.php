<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {

        $services = Services::latest()->paginate(5);

        return view('admin.service.index',compact('services'));
    }

    public function create() {

        return view('admin.service.create');
    }

    public function edit($id) {

        $service = Services::find($id);

        return view('admin.service.edit',compact('service'));
    }

    public function addService(Request $request) {

        $request->validate([
            'title' => 'required|unique:services|min:4|max:50',
            'description' => 'required|min:4|max:150',
            'icon' => 'required',
        ]);

        Services::insert([
           'title' => $request->title,
           'description' => $request->description,
           'icon' => $request->icon,
           'created_at' => Carbon::now()
        ]);

        return redirect()->route('services.all')->with(['alert-type'=>'success','message'=>'Service added successfully.']);
    }

    public function updateService(Request $request, $id) {

        $request->validate([
            'title' => 'required|min:4|max:50',
            'description' => 'required|min:4|max:150',
            'icon' => 'required',
        ]);

        Services::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('services.all')->with(['alert-type'=>'success','message'=>'Service updated successfully.']);
    }

    public function deleteService($id) {

        Services::find($id)->delete();

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Service deleted successfully.']);
    }
}
