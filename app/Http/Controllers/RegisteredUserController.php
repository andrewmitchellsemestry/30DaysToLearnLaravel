<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5), 'confirmed'], // confirmed matches setting for x_confirmation field
        ]);

        // Create the user
        $user = User::create($validatedAttributes);

        // log in
        Auth::login($user);

        //Return the view, maybe redirect home
        return redirect('/jobs');
    }
}
