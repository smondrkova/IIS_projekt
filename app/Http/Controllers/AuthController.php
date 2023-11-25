<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('login');
    }

    public function register_form()
    {
        return view('register');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('events.index'));
        }

        return redirect()->route('auth.login_form')->with("error", "Invalid credentials");
    }

    public function register(Request $request) {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|min:10|max:15'
        ]);

        $data['name'] = $request->name;
        $data['surname'] = $request->surname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['phone_number'] = $request->phone_number;
        $user = User::create($data);

        if(!$user) {
            return redirect(route('auth.register_form'))->with("error", "Registration failed, try again");
        }

        /*[
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number')
        ]*/

        return redirect(route('auth.login_form'))->with("success", "Registration successful, login now");
    }
}
