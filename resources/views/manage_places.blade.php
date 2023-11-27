<!-- resources/views/manage_places.blade.php -->

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
        <h2 class="text-2xl font-bold mb-4">Katalóg miest</h2>

        <div class="flex flex-wrap justify-center gap-10">
            @foreach ($places as $place)
                <div class="card my-4">
                    <img src="{{ $place->photo ? asset('storage/place_photos/'. $place->photo) : asset('placeholders/placeholder.jpg') }}" class="w-full" alt="{{ $place->place_name }}" style="width: 450px;">
                    
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $place->name }}</div>
                    </div>

                    <div class="px-6 pb-2">
                        <a href="{{ route('events.places', ['id' => $place->id, 'name' => $place->name]) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection