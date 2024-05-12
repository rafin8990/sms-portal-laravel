<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('Auth.login');
    }

    public function LoginUser(Request $request)
    {
        $user_Id=$request->input('user_id');
        $password=$request->input('password');

        $user=User::where('mobile',$user_Id)->orWhere('email',$user_Id)->first();
        if($user){
            if (Hash::check($password, $user->password)) {
                Session::put('userId', $user->id);
                return redirect('/dashboard')->with('success', 'Login successful!');

            } else {
                return back()->with('error', 'Login failed. Please check your Id or password.');
            }
        }
        return back()->with('error','Incorrect user name or password');
       
    }

    public function logout()
    {
        if (Session::has('userId')) {
            Session::pull('userId');
            return redirect('/login');
        }
    }
}
