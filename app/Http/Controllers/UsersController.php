<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UsersRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->tickets = $request->input('tickets');
        $user->save();
        return redirect()->route('admin.users');
    }
}
