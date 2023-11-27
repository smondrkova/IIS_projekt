<!-- resources/views/event_detail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
 
@extends('layouts.app')  

@section('content')
    <style>
        body {
            margin: 0;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0px;
            margin: auto;
            max-width: 1000px;
        }

        .grid-item {
            width: 100%; 
        }

        .image {
            width: 480px;
            height: 300px;
        }

        .text {
            max-width: 100%;
        }

        .button-container {
            display: flex;
            justify-content: space-between; 
            align-items: stretch;
        }

        .button-container a,
        .button-container form {
            flex: 1;
            margin: 0 5px;
            display: flex;
            justify-content: center;
        }

        .button-container button {
            flex: 1;
        }

        .links:hover {
            color: #0056b3; 
        }
    </style>


    <div class="container">
        <div class="grid-container">
            <div class="grid-item image">
                @if($event->photo)
                    <img src="{{ asset('storage/event_photos/'. $event->photo) }}"class="img-fluid" alt="{{ $event->event_name }}">
                @else
                    <img src="{{ asset('placeholders/placeholder.jpg') }}" class="img-fluid" alt="{{ $event->event_name }}">
                @endif
            </div>
            <div class="grid-item text">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-4xl font-bold">{{ $event->event_name }}</h1>
                        <br>
                        <p class="card-text">Dátum: {{ \Carbon\Carbon::parse($event->date_of_event)->format('d.m.Y') }}</p>
                        <p class="card-text">Čas: {{ \Carbon\Carbon::parse($event->time_of_event)->format('H:i') }}</p>
                        <a href="{{ route('events.places', ['id' => $event->place->id, 'name' => $event->place->name]) }}" class="links">Miesto podujatia: {{ $event->place->name }}</a>
                        <p class="card-text">Vstupné: {{ $event->entry_fee ? $event->entry_fee.' €' : 'Free' }}</p>
                        <p class="card-text">Kategória: {{ $event->categories->name }}</p>
                        <p class="card-text">Organizátor: {{ $event->organizer->name }} {{ $event->organizer->surname }}</p>
                        @if($event->capacity == 0)
                            <p class="card-text">Kapacita: Neobmedzená</p>
                        @else
                            <p class="card-text">Kapacita: {{ $event->users->count() }}/{{ $event->capacity }}</p>
                        @endif
                        <br>
                        <p class="card-text">{{ $event->description }}</p>
                        <br>
                        <div class="button-container">
                            <a href="{{ $backButtonLink }}" class="btn btn-primary">Späť</a>
                            @if ($backButtonLink != route('approve'))
                                @if ($isRegistered == true)
                                    <form method="POST" action="{{ route('events.unregister', ['id' => $event->id, 'name' => $event->event_name]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-not btn-primary" id='odhlasitSaButton'>Odregistrovať sa</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('events.register', ['id' => $event->id, 'name' => $event->event_name]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" id='registerButton'>Registrovať sa</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

