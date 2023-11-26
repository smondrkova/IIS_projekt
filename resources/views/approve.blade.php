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
    <h1>Unapproved Events</h1>

    @if(count($events) > 0)
        <ul>
            @foreach($events as $event)
                <li>
                    <strong>{{ $event->name }}</strong>
                    <p>{{ $event->description }}</p>
                    <p>Approved: {{ $event->approved ? 'Yes' : 'No' }}</p>

                    {{-- Approve Button --}}
                    <form action="{{ route('approve_event', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>

                    {{-- Delete Button --}}
                    <form action="{{ route('delete_event', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No unapproved events found.</p>
    @endif
@endsection