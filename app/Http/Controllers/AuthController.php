<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return to_route('home')->with('status', 'success');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
            'password' => 'Invalid email or password',
        ]);

    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home')->with('status', 'success');
    }

}
