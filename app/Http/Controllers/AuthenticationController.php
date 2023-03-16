<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    //Register user
    public function createUser(Request $request){
        $validation = $request->validate([
            'username' => [
                'required', 'unique:users', 'max: 12', 'min: 6', 'alpha_num'
            ],

            'email' => [
                'required', 'email', 'unique:users'
            ],

            'password' => [
                'required', 'max:12', 'confirmed', Password::min(6)->numbers()
            ],

            'reg-agree' => [
                'required'
            ]
        ],
    );

      
    }
}
