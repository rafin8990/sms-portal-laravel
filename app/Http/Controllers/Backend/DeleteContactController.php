<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeleteContactController extends Controller
{
    public function DeleteTable()
    {
        $user_id = Session::get("userId");
        // dd($user_id);
        $contacts = Contact::where("user_id", $user_id)->get();
        return view("Backend.DeleteContact.deleteTable", compact("contacts"));
    }
    public function DeleteContact($id)
    {
        $contacts = Contact::find($id)->delete();
        if ($contacts) {
            return redirect()->back()->with("success", "Contact Deleted Successfully");
        } else {
            return redirect()->back()->with("error", "Can not deleted contact. please Try again");
        }
    }

    public function deleteMultipleContacts(Request $request)
    {
        $selectedContacts = $request->input('selectedContacts');

        if ($selectedContacts) {
            Contact::whereIn('id', $selectedContacts)->delete();
            return redirect()->back()->with('success', 'Selected contacts deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'No contacts selected.');
        }
    }
}
