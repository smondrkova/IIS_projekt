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
                        <p class="card-text">Čas: {{ $event->time_of_event }}</p>
                        <a href="{{ route('events.places', ['id' => $event->place->id, 'name' => $event->place->name]) }}" class="links">Miesto podujatia: {{ $event->place->name }}</a>
                        <p class="card-text">Vstupné: {{ $event->entry_fee ? '$'.$event->entry_fee : 'Free' }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

