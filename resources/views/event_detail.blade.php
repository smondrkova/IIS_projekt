<!-- resources/views/event_detail.blade.php -->

@extends('layouts.app')  {{-- Assuming you have a layout file, adjust as needed --}}

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