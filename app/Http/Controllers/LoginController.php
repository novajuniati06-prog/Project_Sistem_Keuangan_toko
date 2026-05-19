<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $users = $request->only('email', 'password');

        if (Auth::attempt($users)){ 
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

?>