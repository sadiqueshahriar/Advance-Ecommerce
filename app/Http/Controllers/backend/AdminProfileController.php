<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        $adminData=Admin::find(2);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function adminProfileEdit(){
        $adminEdit=Admin::find(2);
        return view('admin.admin_profile_edit',compact('adminEdit'));
    }
    public function adminProfileUpdate(Request $request){
        $data=Admin::find(2);
        $data->name=$request->name;
        $data->email=$request->email;

        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            @unlink(public_path('upload/admin_image/'.$data->profile_photo_path));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image/'),$filename);
            $data['profile_photo_path']=$filename;


        }
        $data->save();
        $notification=array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    public function adminProfileChangePassword(){
        return view('admin.admin_profile_change_password');
    }
    public function adminProfileUpdatePassword(Request $request){
        $validateData=$request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed'
        ]);

        $hashPassword=Admin::find(2)->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $admin=Admin::find(2);
            $admin->password=Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');

        }
        else{
            return redirect()->back();
        }


    }
}
