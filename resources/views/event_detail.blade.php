<!-- resources/views/event_detail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/detail_page.css') }}">
</head>
 
@extends('layouts.app')  

@section('content')
    <div class="container">
        <div class="grid-container">
            <div class="grid-item image">
                <img src="{{ asset('placeholders/placeholder.jpg') }}" class="img-fluid" alt="{{ $event->event_name }}">
            </div>
            <div class="grid-item text">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-4xl font-bold">{{ $event->event_name }}</h1>
                        <br>
                        <p class="card-text">Dátum: {{ $event->date_of_event }}</p>
                        <p class="card-text">Čas: {{ $event->time_of_event }}</p>
                        <a href="{{ route('events.places', ['id' => $event->place->id, 'name' => $event->place->name]) }}" class="links">Miesto podujatia: {{ $event->place->name }}</a>
                        <p class="card-text">Vstupné: {{ $event->entry_fee ? '$'.$event->entry_fee : 'Free' }}</p>
                        <p class="card-text">Kategória: {{ $event->categories->name }}</p>
                        <br>
                        <p class="card-text">{{ $event->description }}</p>
                        <br>
                        <div class="button-container">
                            <a href="{{ $backButtonLink }}" class="btn btn-primary">Späť</a>

                            <form method="POST" action="{{ route('events.register', ['id' => $event->id, 'name' => $event->event_name]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary" id='registerButton'>Registrovať sa</button>
                            </form>

                            <form method="POST" action="{{ route('events.unregister', ['id' => $event->id, 'name' => $event->event_name]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" id='odhlasitSaButton'>Odregistrovať sa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

