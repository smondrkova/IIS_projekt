<!-- resources/views/create_request.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/create_request.css') }}">
</head>

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-4">Vytvorenie novej žiadosti</h2>
        <div class="button-container">
            <a href="{{ route('events.create_event') }}" class="btn btn-primary">Vytvoriť novú udalosť</a>
            <a href="{{ route('events.create_category') }}" class="btn btn-primary">Vytvoriť novú kategóriu</a>
            <a href="{{ route('events.create_place') }}" class="btn btn-primary">Vytvoriť nové miesto</a>
        </div>
    </div>
@endsection