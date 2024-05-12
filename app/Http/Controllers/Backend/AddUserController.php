<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function addUserForm(Request $request)
    {
        return view("Backend.AddUser.addUser");
    }

    public function postUser(Request $request)
    {
        $name=$request->user_name;
        $address=$request->address;
        $mobile=$request->mobile;   
        $email=$request->email;
        $role=$request->role;
        $sms=$request->sms;
        $password=$request->password;

        $user=new User();
        $user->user_name=$name;
        $user->address=$address;    
        $user->mobile=$mobile;
        $user->email=$email;
        $user->role=$role;
        $user->sms=$sms;
        $user->password=Hash::make($password);
        $user->save();
        return redirect()->back()->with("success","User Added successfully");
    }
}
