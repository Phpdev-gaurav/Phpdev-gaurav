<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    

    public function index(){

        $contacts = Contact::orderBy('created_at','desc')->paginate('20');
        return view('contact.index')->withContacts($contacts);
    }

    public function create(){
        return view('contact.create'); 
    }

    public function store(Request $request){
       
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'can_receive_text'=>'accepted',
            'has_whatsapp'=>'accepted'
        ]);

        $data = $request->except('_token');
        $contact['first_name'] = $request->first_name;
        $contact['last_name'] = $request->last_name;
        $contactResult = Contact::create($contact);
       
        $phone['contact_id'] = $contactResult->id;
        $phone['number'] = $request->phone;
        if( $request->phone < 10){
            $phone['is_landline'] = 1;
        }else{
            $phone['is_landline'] = 0;
        }
        $phone['can_receive_text'] =  isset($request->can_receive_text) ? 1 : 0;
        $phone['has_whatsapp'] = isset($request->has_whatsapp) ? 1 : 0;
        
     
         $phoneresult =Phone::create( $phone);
   
        
        $email['contact_id'] =$contactResult->id;
        $email['address'] =$request->address;
         $emailResult = Email::create($email);
        

         return redirect()->to('/contact')->with('');
        

    }
}
