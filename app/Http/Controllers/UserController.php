<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $hasSearch = $request->has('search');
        
        return inertia('Users/Index', [
            'users' => User::query()
                ->when(
                    value: $hasSearch,
                    callback: fn(Builder $query) => $query->where(
                        column: 'name',
                        operator: 'LIKE',
                        value: "%{$request->query('search')}%"
                    )
                )
                ->paginate(10),
            'search' => $hasSearch ? $request->search : '',
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
