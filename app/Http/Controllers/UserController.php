<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Users/Index', [
            'users' => User::paginate(10),
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($validatedData);

        return to_route('users.index')->with('success', 'Usuário criado!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('success', 'Usuário excluído!');
    }
}
