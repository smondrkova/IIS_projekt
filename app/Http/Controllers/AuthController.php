<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ], [
            'email.required' => 'Email je povinný.',
            'email.email' => 'Email neexistuje.',
            'password.required' => 'Heslo je povinné.',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('events.index')->with("success", "Prihlásenie prebehlo úspešne!");
        }

        return redirect()->route('auth.login_form')->with("error", "Invalid credentials");
    }

    // $data['password'] = Hash::make($request->password);
    public function register(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string',
            'remember_token' => Str::random(10),
        ], [
            'email.unique' => 'Tento email už existuje, zvoľte iný alebo sa prihláste.',
            'password.min' => 'Heslo musí mať aspoň 8 znakov.',
            'password.confirmed' => 'Heslá sa nezhodujú.',
        ]);

        $validatedData['password'] = Hash::make($request->input('password'));

        User::create($validatedData);

        return redirect(route('auth.login_form'))->with("success", "Registrácia prebehla úspešne! Teraz sa môžete prihlásiť.");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('auth.login_form'))->with('success', 'Boli ste úspešne odhlásený.');
    }
}
