<!-- resources/views/events.blade.php -->

<!DOCTYPE html>
<html lang="en">

@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="my-4 text-3xl font-bold">Nadchádzajúce podujatia</h1>

        <div class="flex flex-wrap justify-center gap-10">
            @foreach ($events as $event)
                <div class="card my-4">
                    <img src="{{ $event->photo ? asset('storage/event_photos/'. $event->photo) : asset('placeholders/placeholder.jpg') }}" class="w-full" alt="{{ $event->event_name }}" style="width: 450px; height: 250px;">
                    
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $event->event_name }}</div>
                        <p class="text-lg">{{ \Carbon\Carbon::parse($event->date_of_event)->format('d.m.Y') }} o {{ \Carbon\Carbon::parse($event->time_of_event)->format('H:i') }}</p>
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

