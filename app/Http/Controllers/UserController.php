<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    //create/register user

    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
       $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        // Hash password

        $formFields['password'] = encrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

       return redirect('/')->with('message', 'user registered and logged in successfully');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('message', 'you have been logged out successfully');
    }
}
