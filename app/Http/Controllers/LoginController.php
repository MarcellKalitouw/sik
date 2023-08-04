<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;


class LoginController extends Controller
{
    public function viewLogin(){
        return view('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }

     public function postLogin(Request $request){
        // dd($request);
         $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
                // dd($credentials);
            return redirect()->intended('/')->withSuccess('Signed In');
        }
        
        
        return redirect('login')->withErrors('Login details are not valid');

    }
}
