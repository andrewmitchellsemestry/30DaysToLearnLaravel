<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        request()->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'password_confirmation' => ['required']
        ]);

        dd(request()->email);

        //Check to see if the passwords are equal
        if (request()->password !== request()->password_confirmation) {
            
        }

        //Return the view, maybe redirect home
    }
}
