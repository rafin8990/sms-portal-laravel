<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AddSMSController extends Controller
{
    public function addSms()
    {
        $users=User::all();
        return view("Backend.AddSms.addSms",compact("users"));
    }
    public function updateUserSMS(Request $request)
    {
        $user=User::find($request->user_id);
        $previousSMS=$user->sms;
        $sms=$request->sms;
        $totalSMS=$previousSMS + $sms;
        $updateUser= User::find($request->user_id)->update([
                "sms"=> $totalSMS,
        ]);

        if($updateUser){
            return redirect()->back()->with("success","SMS Added Successfully");
        }
        else{
            return redirect()->back()->with("error","User can not added");
        }

    }
}
