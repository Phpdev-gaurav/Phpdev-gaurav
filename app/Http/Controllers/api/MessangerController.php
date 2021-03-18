<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use pimax\FbBotApp;


class MessangerController extends Controller
{
    

    public function webhook(Request $request){

        $local_verify_token = env('WEBHOOK_VERIFY_TOKEN');
        $hub_verify_token = $request->get('hub_verify_token');
        if($local_verify_token == $hub_verify_token){
          return   $request->get('hub_challenge');
        }else{
           return "Bad Verify Token"; 
        }
    }
}
