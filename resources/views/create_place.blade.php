<!-- resources/views/create_place.blade.php -->

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
        <h2>Vytvoriť nové miesto konania</h2>

        <form action="{{ route('events.store_place') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Názov miesta</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Adresa miesta</label>
                <input type="text" name="address" id="address" class="form-control" required>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Popis miesta</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="photo">Fotka miesta</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Vytvoriť miesto</button>
        </form>
    </div>
@endsection