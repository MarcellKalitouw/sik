<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;


class LoginController extends Controller
{
    // public function view(){
    //     // dd($request);

    //     return view('pencatatan_keuangan.create');

    // }
    // public function postTest(Request $request, $post){
    //     dd($post);

    // }
    public function viewLogin(){
        if(Auth::user()){
            return Redirect::to(url()->previous());
        }
        return view('login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/');
    }

     public function postLogin(Request $request){
        // dd($request);
         $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
                // dd($credentials);
            return redirect()->intended('/dashboard')->withSuccess('Signed In');
        }
        
        
        return redirect('login')->withErrors('Login details are not valid');

    }
}
