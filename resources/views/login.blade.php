<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@extends('layouts.app')  

@section('content')
    <div class="container">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password">Heslo</label>
                <input type="password" name="password" id="password" required>
            </div>

            <!-- <div class="mb-4">
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            </div> -->

            <button type="submit">Login</button>
        </form>

        <!-- Register link -->
        <div class="mt-4">
            Ešte nemáš účet? <a href="{{ route('auth.register_form') }}">Zaregistruj sa!</a>
        </div>
    </div>
@endsection