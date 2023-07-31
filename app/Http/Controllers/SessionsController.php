<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/user')->with('success','Welcome Back!!');
        }
        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified'
        ]);


    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/login');
    }


}
