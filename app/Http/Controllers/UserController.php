<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('pengguna.index', compact('users'));
    }

    public function create() {
        return view('pengguna.create');
    }

    public function store(Request $request) {
        User::create($request->all());
        return redirect('/pengguna');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('pengguna.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('pengguna.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/pengguna');
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect('/pengguna');
    }

    public function confirmDelete($id) {
        $user = User::findOrFail($id);
        return view('pengguna.delete', compact('user'));
    }
}
