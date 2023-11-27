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
    <div class="container p-8 pl-20">
        <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        
        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required autofocus>
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
        
        @if (session('error'))
            <div class="text-danger">{{ session('error') }}</div>
        @endif
        
        <button type="submit" class="btn btn-primary">Prihlásenie</button>
        </form>

        <!-- Register link -->
        <div class="mt-4">
            <a href="{{ route('auth.register_form') }}" class="btn btn-primary"> Ešte nemáš účet? Zaregistruj sa!</a>
        </div>
    </div>
@endsection