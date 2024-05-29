<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use Hash;
class AuthController extends Controller
{
    //
    public function login() {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request) {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ], $remember)) {
            return redirect('admin/dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Please enter admin email and password');
        }
    }

    public function auth_logout_admin() {
        Auth::logout();
        return redirect('admin');
    }

}
