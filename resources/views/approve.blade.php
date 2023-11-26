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
    <h1>Neschválené položky</h1>

    {{-- Unapproved Events --}}
    <h2>Eventy</h2>

    @if(count($events) > 0)
        <ul>
            @foreach($events as $event)
                <li>
                    <strong>{{ $event->name }}</strong>
                    <p>{{ $event->description }}</p>

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
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ste si istý, že chcete vymazať tento event?')">Vymazať</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Žiadne neschválené eventy.</p>
    @endif

    {{-- Unapproved Categories --}}
    <h2>Kategórie</h2>
    @if(count($categories) > 0)
        <ul>
            @foreach($categories as $category)
                <li>
                    <strong>{{ $category->name }}</strong>

                    {{-- Approve Button --}}
                    <form action="{{ route('approve_category', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Schváliť</button>
                    </form>

                    {{-- Delete Button --}}
                    <form action="{{ route('delete_category', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ste si istý, že chcete vymazať túto kategóriu?')">Vymazať</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Žiadne neschválené kategórie.</p>
    @endif

    {{-- Unapproved Places --}}
    <h2>Miesta</h2>
    @if(count($places) > 0)
        <ul>
            @foreach($places as $place)
                <li>
                    <strong>{{ $place->name }}</strong>
                    <p>{{ $place->address }}</p>
                    <p>{{ $place->description }}</p>
                    <p>{{ $place->photo }}</p>

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
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ste si istý, že chcete vymazať toto miesto?')">vymazať</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Žiadne neschválené miesta.</p>
    @endif
@endsection