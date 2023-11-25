<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{ 
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('user_edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'phone_number' => 'nullable|string|min:10|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect()->route('events.index')->with('success', 'Profile updated successfully!');
    }

}