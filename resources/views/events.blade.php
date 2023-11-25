<!-- resources/views/events.blade.php -->

<!DOCTYPE html>
<html lang="en">
<!-- resources/views/events.blade.php -->

@extends('layouts.app')  {{-- Assuming you have a layout file, adjust as needed --}}

@section('content')
    <div class="container">
        <h1 class="my-4">Nadchádzajúce podujatia</h1>

        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- Assuming there is a 'photo' property in your Event model --}}
                        <img src="{{ $event->photo ? asset($event->photo) : asset('placeholders/placeholder.jpg') }}" class="card-img-top" alt="{{ $event->event_name }}">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->event_name }}</h5>
                            <p class="card-text">{{ $event->date_of_event }} at {{ $event->time_of_event }}</p>
                            <p class="card-text">Lokácia: {{ $event->place_of_event }}</p>
                            <br>
                            <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

