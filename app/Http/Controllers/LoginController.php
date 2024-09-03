<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index() {
        return view('login.index');
    }

    public function store(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()
                ->route('login')
                ->withErrors(['Usuário ou senha inválidos']);
        }
        return redirect()->route('series.index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

}