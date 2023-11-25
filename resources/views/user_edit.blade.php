<!-- resources/views/user.blade.php -->
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
        <h1><strong>Edit Your Profile</strong></h1>

        <form method="POST" action="{{ route('user.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name">Meno</label>
                <input type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="surname">Priezvisko</label>
                <input type="text" name="surname" id="surname" value="{{ $user->surname ?? old('surname') }}" required>
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email ?? old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="phone">Telefón</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone_number ?? old('phone_number') }}">
            </div>

            <div class="mb-4">
                <label for="password">Nové heslo (nechaj prázdné ak nemeníš)</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Potvrď nové heslo</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <button type="submit">Upraviť</button>
        </form>
    </div>
@endsection