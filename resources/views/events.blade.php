<!-- resources/views/events.blade.php -->

<!DOCTYPE html>
<html lang="en">
<!-- resources/views/events.blade.php -->

@extends('layouts.app')  {{-- Assuming you have a layout file, adjust as needed --}}

@section('content')
    <div class="container mx-auto">
        <h1 class="my-4 text-3xl font-bold">Nadchádzajúce podujatia</h1>

        <div class="flex flex-wrap justify-center gap-10">
            @foreach ($events as $event)
                <div class="card my-4">
                    <img src="{{ $event->photo ? asset('storage/event_photos/'. $event->photo) : asset('placeholders/placeholder.jpg') }}" class="w-full" alt="{{ $event->event_name }}" style="width: 450px;">
                    
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $event->event_name }}</div>
                        <p class="text-lg">{{ $event->date_of_event }} o {{ $event->time_of_event }}</p>
                        <p class="text-lg">{{ $event->place->name }}</p>
                    </div>

                    <div class="px-6 pb-2">
                        <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

