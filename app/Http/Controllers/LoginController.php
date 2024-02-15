<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return inertia('Login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validatedData)) {
            return to_route('home');
        }

        return to_route('login.index')->with('error', 'Credenciais inválidas!');
    }

    public function destroy()
    {
        auth()->logout();

        return to_route('home');
    }
}
