<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view ('backend.login');
    }

    public function authenticate(Request $request)
{
    // Validasi input dari request
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Mencoba untuk login dengan kredensial yang diberikan
    if (Auth::attempt($credentials)) {
        // Regenerasi sesi untuk menghindari serangan sesi fixation
        $request->session()->regenerate();

        // Redirect ke halaman yang dituju atau dashboard jika tidak ada tujuan spesifik
        return redirect()->intended('/home');
    }

    // Jika login gagal, kembalikan ke halaman sebelumnya dengan pesan error
    return back()->withErrors([
        'errorLogin' => 'Email or Password invalid!',
    ])->withInput($request->only('email'));
}

     public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}


