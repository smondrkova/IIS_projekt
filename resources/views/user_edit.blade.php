<!-- resources/views/user_edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@extends('layouts.app')  

@section('content')
    <div class="container container p-8 pl-20">
        <h1 class="text-2xl font-bold mb-4">Upraviť môj profil</strong></h1>

        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group mb-4">
                <label for="name">Meno</label>
                <input type="text" name="name" id="name" placeholder="{{ $user->name }}">
            </div>

            <div class="form-group mb-4">
                <label for="surname">Priezvisko</label>
                <input type="text" name="surname" id="surname" placeholder="{{ $user->surname }}">
            </div>

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="{{ $user->email }}">
            </div>

            <div class="form-group mb-4">
                <label for="phone">Telefón</label>
                <input type="text" name="phone" id="phone" placeholder="{{ $user->phone_number }}">
            </div>

            <div class="form-group mb-4">
                <label for="password">Nové heslo (nechaj prázdné ak nemeníš)</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation">Potvrď nové heslo</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Upraviť</button>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Späť</a>
        </form>
    </div>
@endsection