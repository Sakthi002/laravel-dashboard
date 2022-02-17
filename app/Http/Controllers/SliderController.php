<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{

    public function index(){

        $sliders = Slider::latest()->paginate(5);

        return view('admin.slider.index',compact('sliders'));
    }

    public function create(){

        return view('admin.slider.create');
    }

    public function addSlide(Request $request) {

        $request->validate([
            'title' => 'required|unique:sliders|max:50',
            'description' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ],
        [
            'title.required' => 'Title field is required.'
        ]
        );

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();

        Image::make($slider_image)->resize(1920,1088)->save('images/slides/'.$name_gen);

        $slide_img = 'images/slides/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $slide_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('slider.all')->with(['alert-type'=>'success','message'=>'Slide created successfully.']);
    }

    public function edit($id) {

        $slide = Slider::find($id);

        return view('admin.slider.edit', compact('slide'));
    }

    public function updateSlide(Request $request, $id) {

        $request->validate(
            [
                'title' => 'required|max:50',
                'description' => 'required|max:255',
            ]
        );

        $old_slide_image = $request->old_slide_image;

        $new_img = $this->getNewImg($request);

        if($new_img) {

            unlink($old_slide_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $new_img,
                'created_at' => Carbon::now()
            ]);

        } else {

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
        }

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Slide updated successfully.']);
    }

    public function getNewImg(Request $request): ?string
    {
        $image = $request->file('image');

        if($image){

            // BY USING IMAGE INTERVENTION PACKAGE
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1088)->save('images/slides/'.$name_gen);

            return 'images/slides/'.$name_gen;
        }

        return null;
    }

    public function deleteSlide($id) {

        unlink(Slider::find($id)->image);

        Slider::find($id)->delete();

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Slide deleted successfully.']);
    }
}
