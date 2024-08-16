<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // index
    public function index(){
        return view('auth.login');
    }
    // store
    public function store(){
        // validate the date
        $validated = request()->validate([
           'email' => ['required'],
            'password' => ['required','min:8']
        ]);
        // attempt to authenticate the user
        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
               'email' => 'Those credentials are invalid. Please try again.'
            ]);
        }
        // regenerate the session token
        request()->session()->regenerate();
        // redirect the user back
        return redirect()->route('tasks');
    }
    // destroy
    public function destroy(){
        Auth::logout();
        request()->session()->regenerate();
        return redirect()->route('login');
    }
}
