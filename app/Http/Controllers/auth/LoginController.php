<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/customer/dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau Password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
