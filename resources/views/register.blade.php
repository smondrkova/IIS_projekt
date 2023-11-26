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
    <div class="container p-8 pl-20">
        <h2 class="text-2xl font-bold mb-4">Registrácia</strong></h2>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="form-group mb-4">
                <label for="name">Meno</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="surname">Priezvisko</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" required>
                @error('surname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password">Heslo</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Potvrď heslo</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div class="mb-4">
                <label for="phone">Telefón (nepovinný)</label>
                <input type="text" name="phone" id="phone">
            </div>

            <button type="submit" class="btn btn-primary">Registrovať sa</button>
            <a href="{{ route('auth.login_form') }}" class="btn btn-secondary">Už máš účet? Prihlás sa.</a>
        </form>
    </div>
@endsection