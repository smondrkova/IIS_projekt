<!-- resources/views/create_category.blade.php -->

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
        <h2 class="text-2xl font-bold mb-4">Vytvoriť novú kategóriu</h2>

        <form action="{{ route('events.store_category') }}" method="POST">
            @csrf

            <div class="form-group mb-4">
                <label for="name">Názov kategórie</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Vytvoriť kategóriu</button>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Späť</a>
        </form>
    </div>
@endsection