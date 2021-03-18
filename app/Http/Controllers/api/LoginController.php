<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
            $rules = [
                'email'             => 'required|email',
                'password'              => 'required',
             ];
         
         $message = [
            'email.required' =>'Please Insert Email',
            'password.required' =>'Please Insert Password',
         ];
        $validator=Validator::make($request->all(),$rules,$message);
        if ($validator->passes()) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            return response()->json(['user'=>$success, 'message'=>'User login successfully.'],200);
        } 
        else{ 
            return response()->json(['error' => true,'errors'=>$validator->errors()],422);
        } 
    }
    return response()->json(['error' => true,'errors'=>$validator->errors()],422);
}

public function register(Request $request){

            $this->validate($request,[
                'password'=>'required',
                'email'=>'required|email',
                'name'=>'required',
                'country_code'=>'required'
            ]);
        $data = $request->except('_token');
        $data['password'] =  Hash::make($data['password']);
        $user  = User::create($data);


        $accessToken=  $user->createToken('MyApp')->plainTextToken; 

        return response(['user'=>$user, 'access_token'=>$accessToken]);
        
    }
    public function logout(Request $request)
{

    auth()->user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'Successfully logged out'
    ]);
}
}


