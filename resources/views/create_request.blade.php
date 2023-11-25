<!-- resources/views/create_request.blade.php -->

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
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('events.create_event') }}'">
                    Create Event
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('events.create_category') }}'">
                    Create Category
                </button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('events.create_place') }}'">
                    Create Place
                </button>
            </div>
        </div>
    </div>
@endsection