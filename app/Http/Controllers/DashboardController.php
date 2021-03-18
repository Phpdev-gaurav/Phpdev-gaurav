<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    

    public function index(){
        return view('dashboard');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
