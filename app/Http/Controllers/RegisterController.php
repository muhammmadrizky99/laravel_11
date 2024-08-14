<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'captcha' => 'required|captcha'
           
        ]);

        $validated['password']=bcrypt($validated['password']);
        $validated['email_verified_at']=now();
        $validated['remember_token']=Str::random(10);

        User::create($validated);
        return redirect('/login');
        
    }
}
