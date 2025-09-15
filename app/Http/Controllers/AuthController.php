<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Si ya está logueado, adentro
        if (Auth::check()) {
            return redirect()->route('admin');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Intento LDAP usando sAMAccountName
        $ok = Auth::attempt([
            'samaccountname' => $request->input('username'),
            'password'       => $request->input('password'),
        ], $remember = false);

        if ($ok) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin'));
        }

        return back()
            ->withErrors(['username' => 'Credenciales inválidas o usuario no encontrado en AD.'])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
