<!-- resources/views/create_request.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/create_request.css') }}">
</head>

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        @auth
            <h2 class="text-2xl font-bold mb-4">Vytvorenie novej žiadosti</h2>
            <div class="button-container">
                <a href="{{ route('events.create_event') }}" class="btn">Vytvoriť novú udalosť</a>
                <a href="{{ route('events.create_category') }}" class="btn">Vytvoriť novú kategóriu</a>
                <a href="{{ route('events.create_place') }}" class="btn">Vytvoriť nové miesto</a>
            </div>
        @else
            <p class="text-xl font-bold mb-4">
                Vitajte v UdaloMánii! 
                <br><br>
                V našom systéme je možné vytvárať udalosti, kategórie a miesta, kde by sa udalosti mohli konať. Vytváranie
                funguje formou žiadostí, ktoré sú následne schvaľované administrátorom. Ak chcete vytvoriť novú udalosť, kategóriu alebo miesto,
                je potrebné sa registrovať. Ak už máte vytvorený účet, stačí sa prihlásiť. 
                <br><br>
                Radi váš privítame v našom systéme!
            </p>

            <div class="button-container pl-5">
                <a href="{{ route('auth.register_form') }}" class="btn">Registrovať sa</a>
                <a href="{{ route('auth.login_form') }}" class="btn">Prihlásiť sa</a>
            </div>
        @endauth
    </div>
@endsection