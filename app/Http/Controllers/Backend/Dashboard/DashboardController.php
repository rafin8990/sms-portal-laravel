<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SendMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId=Session::get('userId');
        $contacts=Contact::where("user_id",$userId)->get();
        // dd($contact);
        $user=User::find($userId);
        $totalUserSMS=$user->sms;
        $sendSMS=SendMessage::where("user_id",$userId)->get();
        $totalMessageCount = $sendSMS->sum('message_count');
        $remaingMessages=$totalUserSMS-$totalMessageCount;
        // dd($remaingMessages);
        return view('/Backend/Dashboard/dashboard',compact('contacts','remaingMessages','totalMessageCount'));
    }
}
