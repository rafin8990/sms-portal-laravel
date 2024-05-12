<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AddContactController extends Controller
{
    public function AddContactForm()
    {
        return view("Backend.AddContact.addContact");
    }
    public function DownloadBlankExcel()
    {
        $filePath = public_path('contact-sms.xlsx');
        return Response::download($filePath, 'contact-sms.xlsx', [], 'inline');
    }

    public function PostContact(Request $request)
    {
        // dd($request);
        $name = $request->name;
        $address = $request->address;
        $mobile = $request->mobile;
        $user_id = $request->user_id;

        $contact = new Contact();
        $contact->name = $name;
        $contact->address = $address;
        $contact->mobile_no = $mobile;
        $contact->user_id = $user_id;
        $contact->save();

        return redirect()->back()->with('success', 'Successfully added');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        $contacts = [];

        $file = $request->file('file');
        $user_id=$request->input('user_id');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(storage_path('app/uploads'), $file->getClientOriginalName());
            $filePath = storage_path('app/uploads/') . $file->getClientOriginalName();
            $contacts = $this->readExcel($filePath);
        }
        // dd($contacts);

        foreach ($contacts as $contact) {
            if ($contact[0] === null) {
                continue;
            }
                $newContact = new Contact();
                $newContact->name = $contact[0];
                $newContact->address = $contact[2];
                $newContact->mobile_no = $contact[1];
                $newContact->user_id = $user_id;
                $newContact->save();
        }
            return redirect()->back()->with('success', "contact Uploaded successfully");
      
    }

    private function readExcel($filePath)
    {
        $data = [];
        
       
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($filePath);
        
    
        $worksheet = $spreadsheet->getActiveSheet();
        
     
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            
    
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            
           
    
            $data[] = $rowData;
        }
        
        array_shift($data);
        // dd($data);
        return $data;
    }
}
