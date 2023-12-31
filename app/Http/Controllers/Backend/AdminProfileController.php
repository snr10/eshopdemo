<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function  AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile',compact('adminData'));
    }

    public function  AdminProfileEdit(){
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function  AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('file')){
            $file = $request->file('file');
            @unlink(public_path('upload/admin_images/'.$data->profile_photopath));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path']=$filename;
       }

       $data->save();
       $notification = array(
        'message' => 'Admin Profile Updated Succesfully',
        'alert-type' =>'success'
       );
       return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){
        return view('admin.change_password');
    }

    public function AdminUpdatePassword(Request $request){

        $validateData = $request->validate([
            'current_password' => 'required',
            'password'=>'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->current_password,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.login');
        }else{
            return redirect()->back();
        }



    }
}
