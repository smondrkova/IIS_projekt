<!-- resources/views/edit_event.blade.php -->

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
        <h2 class="text-2xl font-bold mb-4">Upraviť udalosť</h2>

        <form action="{{ route('events.update_event', ['id' => $event->id, 'name' => $event->event_name]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="form-group mb-4">
                <label for="event_name">Názov</label>
                <input type="text" name="event_name" id="event_name" class="form-control" value="{{ $event->event_name }}">
                @error('event_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="date_of_event">Dátum konania</label>
                <input type="date" name="date_of_event" id="date_of_event" class="form-control" value="{{ $event->date_of_event }}">
                @error('date_of_event')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="time_of_event">Čas konania</label>
                <input type="time" name="time_of_event" id="time_of_event" class="form-control" value="{{ $event->time_of_event }}">
                @error('time_of_event')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="place_of_event">Miesto konania:</label>
                <select name="place_of_event" id="place_of_event">
                    @foreach($places as $place)
                        <option value="{{ $place->id }}" {{ $event->place_of_event == $place->id ? 'selected' : '' }}>
                        {{ $place->name }}
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="entry_fee">Voliteľné vstupné</label>
                <input type="number" name="entry_fee" id="entry_fee" class="form-control" step="0.1" value= "{{ $event->entry_fee }}">
            </div>

            <div class="form-group mb-4">
                <label for="category">Kategória:</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $event->category == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="capacity">Kapacita (ak požadujete neobmedzenú kapacitu, nastavte ju na 0)</label>
                <input type="number" name="capacity" id="capacity" class="form-control" value= "{{ $event->capacity }}">

            <div class="form-group mb-4">
                <label for="description">Popis eventu</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $event->description }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label for="photo">Titulná fotka</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Upraviť</button>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Späť</a>
        </form>
    </div>
@endsection