<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function showLogin(){
        return view('auth.login');
    }


    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])
        ){
            return redirect('/dashboard');
        }
        return redirect('/login')->with('error', 'Invalid Email address or Password');
    }

    public function addUser(Request $request){

        $this->validate($request,[
            'password'=>'required',
            'email'=>'required|email',
            'name'=>'required',
            'country_code'=>'required'
        ]);
    $data = $request->except('_token');
    $data['password'] =  Hash::make($data['password']);
    $user  = User::create($data);


    

    return redirect()->to('login');
    
}
public function register(){
    return view('auth.register');
}

}
