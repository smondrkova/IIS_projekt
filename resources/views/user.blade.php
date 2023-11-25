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
        <h1><strong>Tvoj profil</strong></h1>
        <br>
        <p><strong>Meno:</strong> {{ $user->name }}</p>
        <p><strong>Priezvisko:</strong> {{ $user->surname }}</p>
        <p><strong>Telefón:</strong> {{ $user->phone_number }}</p>
        <br>
        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Uprav profil</a>
    </div>
@endsection