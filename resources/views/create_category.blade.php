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
    <div class="container">
        <h2>Vytvoriť novú kategóriu</h2>

        <form action="{{ route('events.store_category') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Názov kategórie</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Vytvoriť kategóriu</button>
        </form>
    </div>
@endsection