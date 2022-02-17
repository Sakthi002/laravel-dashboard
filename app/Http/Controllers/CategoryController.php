<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allCategories() {

        //=========================ELOQUENT ORM METHOD==============
        //$categories = Category::all();
        //RETURNS LATEST DATA ON TOP
        $categories = Category::latest()->paginate(5,['*'],'categories');

        // Deleted Categories
        $trashedCategories = Category::onlyTrashed()->latest()->paginate(3,['*'],'trash');

        //==========================================================

        //=========================QUERY BUILDER METHOD==============
            //$categories = DB::table('categories')->latest()->get();
        //==========================================================

        //=========================QUERY BUILDER METHOD FOR JOIN TABLE==============
        // $categories = DB::table('categories')
        //     ->join('users','categories.user_id', 'users.id')
        //     ->select('categories.*','users.name')
        //     ->latest('categories.created_at')->paginate(5);
        //==========================================================

        return view('admin.category.index', compact('categories','trashedCategories'));
    }

    public function addCategory(Request $request) {

        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255'
            ],
            //Custom Error Messages
            [
                'category_name.required' => 'This field is required.',
                'category_name.max' => 'This name should be less than 255 characters.'
            ]
        );

        //=======================ELOQUENT ORM METHOD======================
            //Category::insert([
            //    'category_name' => $request->category_name,
            //    'user_id' => Auth::user()->id,
            //    'created_at' => Carbon::now()
            //]);
            //ANOTHER WAY TO INSERT
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->user_id = Auth::user()->id;
            $category->save();
        //================================================================

        //=======================QUERY BUILDER METHOD======================
            //$data = [];
            //$data['category_name'] = $request->category_name;
            //$data['user_id'] = Auth::user()->id;
            //DB::table('categories')->insert($data);
        //================================================================

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Category added successfully.']);
    }

    public function edit($id) {
        // ELOQUENT ORM METHOD
        //$category = Category::find($id);

        // QUERY BUILDER METHOD
        $category = DB::table('categories')->where('id',$id)->first();

        return view('admin.category.edit',compact('category'));
    }

    public function updateCategory(Request $request,$id) {

        $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255'
            ],
            //Custom Error Messages
            [
                'category_name.required' => 'This field is required.',
                'category_name.max' => 'This name should be less than 255 characters.'
            ]
        );

        // ELOQUENT ORM METHOD
        //Category::find($id)->update([
        //    'category_name' => $request->category_name,
        //    'user_id' => Auth::user()->id
        //]);

        // QUERY BUILDER METHOD
        $data = [];
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->where('id',$id)->update($data);

        return redirect()->route('category.all')->with(['alert-type'=>'success','message'=>'Category updated successfully.']);
    }

    public function moveToTrash($id) {

        Category::find($id)->delete();

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Category moved to trash successfully.']);
    }

    public function restoreCategory($id) {

        Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Category restored successfully.']);
    }

    public function deleteCategory($id) {

        Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with(['alert-type'=>'success','message'=>'Category deleted successfully.']);
    }
}
