<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AddMessageController extends Controller
{

    public function ViewBanglaMessageForm()
    {
        return view("Backend.AddMesage.banglaMessage");
    }
    public function ViewEngMessageForm()
    {
        return view("Backend.AddMesage.engMessage");
    }
    

    public function PostMessage(Request $request)
    {
        // dd($request);
        $messageType = $request->message_type;
        $message = $request->message;
        $messageCount = $request->message_count;
        $user_id= $request->user_id;    

        $newMessage = new Message();
        $newMessage->message_type = $messageType;
        $newMessage->message = $message;
        $newMessage->message_count = $messageCount; 
        $newMessage->user_id = $user_id; 
        $newMessage->save();

        return redirect()->back()->with('success', 'Message added successfully. Message count: ' . $messageCount);
    }
}
