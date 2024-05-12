<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use App\Models\SendMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SendSMSController extends Controller
{
    public function sendMessageForm(Request $request)
    {
        $messageType = null;
        $message = null;
        $userId = Session::get('userId');
        $contacts = Contact::where("user_id", $userId)->get();
        $messages = Message::where("user_id", $userId)->get();
        return view("Backend.SendMessage.sendMessage", compact("contacts", "messages", "messageType", "message", "userId"));
    }

    public function getContact(Request $request)
    {


        
        $messageType = $request->messageType;
        $message = $request->text_message;
        $userId = $request->user_id;
        $message_count = $request->message_count;
        $contacts = $request->contacts;
        $sendSMS=SendMessage::where("user_id",$userId)->get();
        $totalMessageCount = $sendSMS->sum('message_count');

        if(!$contacts){
            return redirect()->back()->with("error","Please select atleast One Contact");
        }

        $totalContacts=count($contacts);
        $totalMessages=$totalContacts * $message_count ;
        $users = User::where('id', $userId)->first();
        $totalUserSMS=$users->sms;
        $userName=$users->user_name;

        if($totalMessages>$totalUserSMS){
            return redirect()->back()->with('error','You Do not have Sufficient Message. Please Ask message to the Customer Care');
        }

        $remaingMessages=$totalUserSMS-$totalMessageCount;

        if($remaingMessages === 0){
            return redirect()->back()->with('error','You Do not have Sufficient Message. Please Ask message to the Customer Care');
        }
        
        $messageEncoded = urlencode($message);
        $sid = "Bdassociateeng";
        foreach ($contacts as $contact) {

            if(!empty($message)){
                $url = "http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=bassociate&password=8d611d3ea607e1e12f0f3440c314c3c1&MsgType=TEXT&receiver=$contact&message=$messageEncoded";
                $param = "user=bassociate&pass=8d611d3ea607e1e12f0f3440c314c3c1&sms[0][0]= $contact&sms[0][1]=" . urlencode("$request->message") . "&sms[0][2]=123456789&sid=$sid";
    
                $crl = curl_init();
                curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($crl, CURLOPT_URL, $url);
                curl_setopt($crl, CURLOPT_HEADER, 0);
                curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($crl, CURLOPT_POST, 1);
                curl_setopt($crl, CURLOPT_POSTFIELDS, $param);
                $response = curl_exec($crl);
                curl_close($crl);
            }


            if (!empty($message)) {
            $messagee = new SendMessage();
            $messagee->user_id = $userId;
            $messagee->message_type = $messageType;
            $messagee->message_count = $message_count;
            $messagee->user_name = $userName;
            $messagee->contact = $contact;
            $messagee->message = $message;
            $messagee->save();
            }

           
        }

        return redirect()->back()->with('success', 'Message Sent Successfully');

    }

}
