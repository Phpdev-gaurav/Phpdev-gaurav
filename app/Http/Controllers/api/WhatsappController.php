<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsappController extends Controller
{
    //

    public function store(Request $request){

        $sid = "ACbfb3be5cd579032fc74384505a2ceacb"; // Your Account SID from www.twilio.com/console
        $token = "0591146da7c98ba5f9b0f89d1a38ad34"; // Your Auth Token from www.twilio.com/console
         $contact = Phone::where('number',$request->phone)->first();
      

        if(isset($contact)){
            if($contact->is_landline == 0){
                $client = new Client( $sid,$token);

       
                $message =   $client->messages 
                ->create("whatsapp:$contact->number", // to 
                         array( 
                             "from" => "whatsapp:+14155238886",       
                             "body" => $request->body
                         ) 
                ); 
               dd($message);
            }

            $this->facebookContact($contact);
            
        }

        return response()->json(['errors'=>'Phone number dont match'],400);

       
        
       

   

    //     $data = [
    //         'token'=> "7bae9d436eb2b9813d86d3856329413b",
    // "source"=>'507625645228',
    // "destination"=> '+9779860921715',
    // "type"=> "text",
    // "channel"=> "whatsapp",
    // "body"=>[
    //           "text"=> "Hello wordl! this is from bhupendr sapkota"
    //         ],

    //     ];


    //     $client = new \GuzzleHttp\Client();
    //     $response = $client->request('POST','http://waping.es/api/send',
    //     ['headers'=>['Content-Type'=>'application/json'],
    //     'json'=>$data
    // ]
    // );
 


    //    echo  $response->getStatusCode();
    //    echo $response->getBody();
    }



    public function facebookContact($contact){
            dd($contact);
    }
}
