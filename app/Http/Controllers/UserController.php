<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        if ($search = $request->search) {
            $users = $users
                ->where('name', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        }

        return Inertia::render('Users/Index', [
            'users' => UserResource::collection($users->paginate(5, ['id', 'name', 'email'])->withQueryString()),
            'search' => $search
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('createUser', User::class);

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'editUser' => $user->only(['id', 'email', 'name'])
        ]);
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password_confirmation' => 'bail|required_with:password|same:password'
        ]);

        $user->name = $request->name;
        if ($request->password) {
            $user->password = $request->password;
        }
        $user->save();

        return redirect()->route('users.index');
    }
}
