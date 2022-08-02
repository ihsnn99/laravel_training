<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function loginattempt(){
        $isAuth = auth()->attempt([
            'name' => request()->email1,
            'password' => request()->password1
        ]);

        if($isAuth){
            return redirect('admin/utama');
        }else{
            return redirect('errors/unauthorized');
        }
    }

    function logout(){
        Auth::logout();

        return redirect('login');
    }
}
