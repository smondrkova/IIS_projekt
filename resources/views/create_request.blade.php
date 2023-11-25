<!-- resources/views/create_request.blade.php -->

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
        <h2>Vytvoriť nový event</h2>

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="event_name">Názov eventu</label>
                <input type="text" name="event_name" id="event_name" class="form-control" required>
                @error('event_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_event">Dátum konania eventu</label>
                <input type="date" name="date_of_event" id="date_of_event" class="form-control" required>
                @error('date_of_event')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_of_event">Čas konania eventu</label>
                <input type="time" name="time_of_event" id="time_of_event" class="form-control" required>
                @error('time_of_event')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="place_of_event">Miesto konania eventu:</label>
                <select name="place_of_event" id="place_of_event">
                    @foreach($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="entry_fee">Voliteľné vstupné</label>
                <input type="number" name="entry_fee" id="entry_fee" class="form-control" step="0.1">
            </div>

            <div class="form-group">
                <label for="category">Kategória:</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Popis eventu</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="photo">Fotka eventu</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Vytvoriť event</button>
        </form>
    </div>
@endsection