<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $data_user = User::where('email', $request->email)->first();

        if (empty($data_user)) {
            return redirect('/auth/login')->with('error', 'Email Salah!!!');
        }

        if (!password_verify($request->password, $data_user->password)) {
            return redirect('/auth/login')->with('error', 'Password Kurang Tepat!!!');
        }
       
        $request->session()->put('username',$data_user['username']);
        $request->session()->put('email',$data_user['email']);
        $request->session()->put('password',$data_user['password']);
        return redirect('/home');
        // dd(session()->all());

        // session(['user_id' => $user->id]);
        // session(['username' => $user->username]);
        // dd($user);

        // data user dimasukkan ke session
        // redirect ke dashboard

        // if (!empty($user)) {
        //     if (password_verify($request->password, $user->password)) {
        //         // data user dimasukkan ke session
        //         // redirect ke dashboard

        //         $data_user = [
        //             'id' => $user->id,
        //             'username' => $user->username,
        //         ];

        //         Session::put($data_user);
        //     } else {
        //         return back();
        //     }
        // } else {
        //     return back();
        // }
   
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect('/home');
        // }else{
        //     return redirect('/auth/login')->with('error', 'Login Gagal!!!');
        // }

    }
    public function logout(Request $request){
            Auth::logout();
        
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect('/auth/login');
    }
}
