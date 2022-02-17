<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function password() {

        return view('admin.profile.change_password');
    }

    public function updatePassword(Request $request) {

        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $current_pass = Auth::user()->password;

        if(Hash::check($request->oldpassword, $current_pass)){

            $user = User::find(Auth::user()->id);

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::logout();

            return redirect()->route('login')->with(['alert-type'=>'success','message'=>'Password updated successfully']);
        } else {

            return redirect()->back()->with(['alert-type'=>'error','message'=>'Current Password is not valid']);
        }
    }

    public function profile() {

        if(Auth::user()){

            $user = User::find(Auth::user()->id);

            if($user) {

                return view('admin.profile.change_profile', compact('user'));
            }
        }
    }

    public function updateProfile(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $old_profile_image = $request->old_pro_image;

        $user = User::find(Auth::user()->id);

        if($user){

            $user->name = $request->name;

            $user->email = $request->email;

            if($request->profile_pic) {

                $image = $request->file('profile_pic');

                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

                Image::make($image)->resize(160,160)->save('storage/profile-photos/'.$name_gen);
                unlink('storage/'.$old_profile_image);
                $user->profile_photo_path = 'profile-photos/'.$name_gen;
            }

            $user->save();

            return redirect()->back()->with(['alert-type'=>'success','message'=>'Profile updated successfully']);

        } else {

            return redirect()->back()->with(['alert-type'=>'error','message'=>'User not found']);
        }
    }
}
