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
                    <img src="{{ asset('storage/place_photos/'. $place->photo) }}"class="img-fluid" alt="{{ $place->name }}">
                @else
                    <img src="{{ asset('placeholders/placeholder.jpg') }}" class="img-fluid" alt="{{ $place->name }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection