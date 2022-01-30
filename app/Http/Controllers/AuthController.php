<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        # code...
        return view('/auth/login');
    }
    public function postLogin(Request $request)
    {
        # code...
         $cred=$request->only('email','password');

         if(Auth::attempt($cred)){
             if(auth()->user()->is_admin=='yes'){
                return redirect('/admin');
             };
             return redirect()->back();

         }
    }
    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('/admin/login');
    }
}