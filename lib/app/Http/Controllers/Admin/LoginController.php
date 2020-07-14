<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    //
    public function getLogin() {
        return view('backend.login');
    }
    public function postLogin(Request $request) {
        $array = ['email'=>$request->email, 'password' => $request->password];
       if($request->remember = 'Remember') {
           $remember = true;
       } else {
           $remember = false;
       }
        if(Auth::attempt($array, $remember)) {
            return redirect()->intended('admin/home');
       } else {
           return back()->withInput()->with('error','Email or Password is valid');
       }
    }
}
