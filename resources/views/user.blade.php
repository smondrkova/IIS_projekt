<!-- resources/views/user.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

@extends('layouts.app')  

@section('content')
    <div class="container p-8 pl-20">
        <h1 class="text-2xl font-bold mb-4">Môj profil</h1>
        <br>
        <p><strong>Meno:</strong> {{ $user->name }}</p>
        <p><strong>Priezvisko:</strong> {{ $user->surname }}</p>
        <p><strong>Email:</strong> {{ $user->email}}</p>
        <p><strong>Telefón:</strong> {{ $user->phone_number }}</p>
        <br>
        <div style="display: flex; gap: 8px">
            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Upraviť profil</a>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Odhlásiť sa</button>
            </form>
        </div>
        <br><br>
        <h1 class="text-2xl font-bold mb-4">Moje udalosti</h1>

        @if($user->events->isNotEmpty())
            <ul>
                @foreach($user->events->sortBy('date_of_event') as $event)
                    <li>
                        <strong>{{ $event->event_name }}</strong> - 
                        {{ $event->date_of_event }} 
                        {{ $event->time_of_event }}
                    </li>
                @endforeach
                </ul>
        @else
            <p>Aktuálne nie ste zaregistrovaný na žiadnej udalosti.</p>
        @endif
    </div>
@endsection