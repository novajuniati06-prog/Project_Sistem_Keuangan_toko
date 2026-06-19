<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // REGISTER

    public function register(Request $request)
    {
        $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:users,email',
    'phone' => 'required|numeric|digits_between:10,15',
    'shop_name' => 'required',
    'shop_address' => 'required',
    'password' => 'required|min:8|confirmed',
], [

    'phone.required' => 'Nomor HP wajib diisi',
    'phone.numeric' => 'Nomor HP harus berupa angka',
    'phone.digits_between' => 'Nomor HP harus 10 sampai 15 digit',
    ]);

        User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'shop_name' => $request->shop_name,
    'shop_address' => $request->shop_address,
    'password' => Hash::make($request->password),
]);

        return redirect('/login');
    }

    // LOGIN

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // cek email ada atau tidak

    $user = User::where('email', $request->email)->first();

    if(!$user){

        return back()->with('error', 'Akun belum terdaftar');

    }

    // cek password

    if(Auth::attempt($credentials)){

        return redirect('/dashboard');

    }

    return back()->with('error', 'Email atau password salah');
}

    // LOGOUT

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}