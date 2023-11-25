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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $event->event_name }}</h1>
                <p class="card-text">Date: {{ $event->date_of_event }}</p>
                <p class="card-text">Time: {{ $event->time_of_event }}</p>
                <p class="card-text">Location: {{ $event->place_of_event }}</p>
                <p class="card-text">Entry Fee: {{ $event->entry_fee ? '$'.$event->entry_fee : 'Free' }}</p>
                <p class="card-text">Category: {{ $event->category }}</p>

                <img src="{{ $event->photo ? asset($event->photo) : asset('placeholders/placeholder.jpg') }}" class="card-img-top" alt="{{ $event->event_name }}">

                <p class="card-text">Description: {{ $event->description }}</p>

                <br>
                <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
            </div>
        </div>
    </div>
@endsection