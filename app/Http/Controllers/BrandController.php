<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function addBrand(Request $request){

        $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4|max:255',
                'brand_image' => 'required|mimes:jpg,jpeg,png,gif'
            ],
            //CUSTOM ERRORS
            [
                'brand_name.required' => 'This field is required.',
                'brand_image.required' => 'This field is required.'
            ]
        );

        $last_img = $this->getLastImg($request);

        $brand = new Brand();
        $brand['brand_name'] = $request->brand_name;
        $brand['brand_image'] = $last_img;
        $brand->save();

        return redirect()->back()->with('success','Brand added successfully.');
    }

    public function edit($id) {
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function updateBrand(Request $request, $id) {

        $request->validate(
            [
                'brand_name' => 'required|min:4|max:255',
            ],
            //CUSTOM ERRORS
            [
                'brand_name.required' => 'This field is required.'
            ]
        );

        $old_image = $request->old_image;

        $last_img = $this->getLastImg($request);

        if($last_img) {

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } else {

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success','Brand updated successfully.');
    }

    /**
     * @param Request $request
     * @return string|null
     */
    public function getLastImg(Request $request)
    {
        $brand_image = $request->file('brand_image');

        if($brand_image){

            // BY USING IMAGE INTERVENTION PACKAGE
            $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300,200)->save('images/brands/'.$name_gen);

            // NORMAL METHOD
            //$img_uniq_key = hexdec(uniqid());
            //$img_ext = strtolower($brand_image->getClientOriginalExtension());
            //$img_name = $img_uniq_key . '.' . $img_ext;
            //$up_location = 'images/brands/';
            //$last_img = $up_location . $img_name;
            //$brand_image->move($up_location, $img_name);

            return 'images/brands/'.$name_gen;
        }

        return null;
    }

    public function deleteCategory($id) {

        unlink(Brand::find($id)->brand_image);

        Brand::find($id)->delete();

        return redirect()->back()->with('success','Brand deleted successfully.');
    }

    public function multiImage() {
        $images = Multipic::all();
        return view('admin.portfolio.index',compact('images'));
    }

    public function storeImages(Request $request) {

        $request->validate([
            'images' => 'required'
        ]);

        $images = $request->file('images');

        foreach ($images as $image) {

            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300,300)->save('images/portfolio/'.$name_gen);

            $final_img = 'images/portfolio/'.$name_gen;

            Multipic::insert([
                'image' => $final_img,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->back()->with('success','Images uploaded successfully.');
    }

    public function logOut() {

        Auth::logout();

        return redirect()->route('login')->with('success','User logout successfully.');
    }
}
