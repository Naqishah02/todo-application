<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    // index
    public function index(){
        return view('auth.register');
    }
    // store
    public function store(){
        // validate
        $validatedData = request()->validate([
           'name' => ['required','min:3','max:25'],
           'email' => ['required','email','unique:users'],
            'password' => ['required','min:8']
        ]);
        $validatedData['name'] = ucfirst($validatedData['name']);
        // create the user
        $user = User::create($validatedData);
        // log the user in
        Auth::login($user);
        // redirect to home
        return redirect()->route('tasks');
    }
}
