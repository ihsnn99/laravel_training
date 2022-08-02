<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        $user = new User;

        $user = $user->where('name', '=', request()->name)->first();

        if($user && Hash::check(request()->password, $user->getAuthPassword())){
            return $user->createToken(time())->plainTextToken;
        }

        return 'You entered wrong username or password';
    }

    public function logout(){
        auth()->user()->currentAccessToken()->delete();

        return 'You are successfully logged out';
    }
}
