<!-- resources/views/approve.blade.php -->

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
        <h1 class="text-2xl font-bold mb-4">Neschválené žiadosti</h1>

        {{-- Unapproved Events --}}
        <h2 class="text-xl font-bold">Udalosti</h2>

        <style>
            ul {
                list-style-type: none;
                padding: 10px;
            }

            strong {
                width: 200px;
            }

            .event-request, .category-request, .place-request {
                display: flex; 
                gap: 15px; 
                align-items: center;
                padding: 10px;
                border: 3px solid #0c151b; 
                width: 500px;  
                border-radius: 5px;
            }

            .category-request {
                border: 3px solid #446879; 
            }

            .place-request {
                border: 3px solid #608da2; 
            }
        </style>

        @if(count($events) > 0)
            <ul>
                @foreach($events as $event)
                    <li class="event-request">
                        <strong>{{ $event->event_name }}</strong>

                        {{-- Detail Button --}}
                        <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}" class="btn btn-primary">Detail</a>

                        {{-- Approve Button --}}
                        <form action="{{ route('approve_event', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Schváliť</button>
                        </form>

                        {{-- Delete Button --}}
                        <form action="{{ route('delete_event', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-not" onclick="return confirm('Ste si istý, že chcete vymazať túto žiadosť?')">Neschváliť</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-md pl-5">Aktuálne nemáte žiadne udalosti na schválenie.</p>
        @endif

        {{-- Unapproved Categories --}}
        <h2 class="text-xl font-bold mt-4">Kategórie</h2>
        @if(count($categories) > 0)
            <ul>
                @foreach($categories as $category)
                    <li class="category-request">
                        <strong style="width: 275px;">{{ $category->name }}</strong>

                        {{-- Approve Button --}}
                        <form action="{{ route('approve_category', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Schváliť</button>
                        </form>

                        {{-- Delete Button --}}
                        <form action="{{ route('delete_category', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-not" onclick="return confirm('Ste si istý, že chcete vymazať túto žiadosť?')">Neschváliť</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-md pl-5">Aktuálne nemáte žiadne kategórie na schválenie.</p>
        @endif

        {{-- Unapproved Places --}}
        <h2 class="text-xl font-bold mt-4">Miesta</h2>
        @if(count($places) > 0)
            <ul>
                @foreach($places as $place)
                    <li class="place-request">
                        <strong>{{ $place->name }}</strong>

                        <a href="{{ route('events.places', ['id' => $place->id, 'name' => $place->name]) }}" class="btn btn-primary">Detail</a>

                        {{-- Approve Button --}}
                        <form action="{{ route('approve_place', $place->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Schváliť</button>
                        </form>

                        {{-- Delete Button --}}
                        <form action="{{ route('delete_place', $place->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-not" onclick="return confirm('Ste si istý, že chcete vymazať túto žiadosť?')">Neschváliť</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-md pl-5">Aktuálne nemáte žiadne miesta na schálenie.</p>
        @endif
    </div>
@endsection