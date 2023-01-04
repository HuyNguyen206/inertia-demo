<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function handle(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->all())) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors(['email' =>  'Invalid email or password']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
