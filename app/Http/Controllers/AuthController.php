<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return redirect()->route('beers')->with('token', $token);
        }

        return redirect()->route('login')->withErrors(['Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
