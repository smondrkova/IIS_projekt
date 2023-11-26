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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's attributes if the fields are not empty
    if ($validatedData['name']) {
        $user->name = $validatedData['name'];
    }

    if ($validatedData['surname']) {
        $user->surname = $validatedData['surname'];
    }

    if ($validatedData['email']) {
        $user->email = $validatedData['email'];
    }

    if ($validatedData['phone_number']) {
        $user->phone_number = $validatedData['phone_number'];
    }

    // Update the password if provided
    if ($validatedData['password']) {
        $user->password = bcrypt($validatedData['password']);
    }

        // Save the changes
        $user->save();

        return redirect()->route('user.show', ['id' => $id])->with('success', 'Profil bol úspešne upravený.');
    }

}