<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('User.index', compact('users'));
    }

    public function show($id)
    {
        $user = collect(User::all())->firstWhere('id', $id);
        return view('User.show', compact('user'));
    }

    public function edit($id)
    {
        $user = collect(User::all())->firstWhere('id', $id);
        return view('User.edit', compact('user'));
    }

    public function confirmDelete($id)
    {
        $user = collect(User::all())->firstWhere('id', $id);
        return view('User.delete', compact('user'));
    }
}

