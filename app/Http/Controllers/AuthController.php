<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function login(){
        return view('front-pages.login.index');
    }

    public function loginPost(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
   
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/home');
        }else{
            return redirect('/auth/login')->with('error', 'Login Gagal!!!');
        }

    }
    public function logout(Request $request){
            Auth::logout();
        
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect('/auth/login');
    }
}
