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
    <div class="container p-8 pl-20">
        <h1 class="text-2xl font-bold mb-4">Môj profil</strong></h1>
        <br>
        <p><strong>Meno:</strong> {{ $user->name }}</p>
        <p><strong>Priezvisko:</strong> {{ $user->surname }}</p>
        <p><strong>Email:</strong> {{ $user->email}}</p>
        <p><strong>Telefón:</strong> {{ $user->phone_number }}</p>
        <br>
        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Upraviť profil</a>
    </div>
@endsection