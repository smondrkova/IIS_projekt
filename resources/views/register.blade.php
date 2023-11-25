<!-- resources/views/register.blade.php -->
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
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name">Meno</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label for="surname">Priezvisko</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" required>
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="password">Heslo</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Potvrď heslo</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="mb-4">
                <label for="phone">Telefón (nepovinný)</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
@endsection