<!-- resources/views/place_detail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/detail_page.css') }}">
</head>
 
@extends('layouts.app')  

@section('content')
    <div class="container">
        <div class="grid-container">
            <div class="grid-item image">
            @if($place->photo)
                    <img src="{{ asset('storage/place_photos/'. $place->photo) }}" alt="{{ $place->name }}">
                @else
                    <img src="{{ asset('placeholders/placeholder.jpg') }}" alt="{{ $place->name }}">
            @endif
            </div>
            <div class="grid-item text">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-4xl font-bold">{{ $place->name }}</h1>
                        <br>
                        <p class="card-text">Adresa: {{ $place->address }}</p>
                        <br>
                        <p class="card-text">{{ $place->description }}</p>
                        <br>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Späť</a>
                        @if((auth()->user()->id == 1 || auth()->user()->id == 2) && $deleteButtonDisplay)
                            <form action="{{ route('delete_place', $place->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-not mt-2" type="submit" onclick="return confirm('Ste si istý, že chcete vymazať toto miesto?')">Vymazať</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection