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
    <div class="container p-8 pl-20">
        <h2 class="text-2xl font-bold mb-4">Vytvoriť nové miesto konania</h2>

        <form action="{{ route('events.store_place') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-4">
                <label for="name">Názov miesta</label>
                <input type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="address">Adresa miesta</label>
                <input type="text" name="address" id="address" class="form-control" required>
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="description">Popis miesta</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="photo">Fotografia miesta</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
                @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Vytvoriť miesto</button>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Späť</a>
        </form>
    </div>
@endsection