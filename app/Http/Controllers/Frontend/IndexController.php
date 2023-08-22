<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.index',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('file')){
            $file = $request->file('file');
            
            // @unlink(public_path('upload/admin_images/'.$data->profile_photopath));
            $filename = date('YmdHi')."_".$data->id."_".$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
       }

       $data->save();
       $notification = array(
        'message' => 'User Profile Updated Succesfully',
        'alert-type' =>'success'
       );
       return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        return view('frontend.profile.password');
    }

    public function UserPasswordUpdate(Request  $request){
        $validateData = $request->validate([
            'current_password' => 'required',
            'password'=>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('/');
        }else{
            return redirect()->back();
        }
    }
}
