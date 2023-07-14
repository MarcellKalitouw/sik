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
            'nama_user' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
                // dd($credentials);
            $credentials = $request->only('nama_user', 'password');
            return redirect()->intended('/dashboard')->withSuccess('Signed In');
        }
        
        
        return redirect('login')->withErrors('Login details are not valid');

    }
}
