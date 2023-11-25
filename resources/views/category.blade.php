<!-- resources/views/category.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

@extends('layouts.app') 

@section('content')
    <body class="bg-gray-100">

        <div class="flex p-8">
            <div class="w-1/4">
                <h2 class="text-2xl font-bold mb-4">Kategórie</h2>
                <ul>
                    @foreach ($categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('events.category_page', ['id' => $category->id, 'name' => $category->name]) }}"
                            class="text-blue-500">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-3/4">
                <h2 class="text-2xl font-bold mb-4">Udalosti</h2>
                
                <p class="text-lg font-bold mb-2">Udalosti z kategórie {{ $selectedCategory->name }}</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($selectedCategory->events as $event)
                    <div class="card">
                        <img src="{{ asset('placeholders/placeholder.jpg') }}" class="w-full" alt="{{ $event->event_name }}"
                            style="width: 450px;">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $event->event_name }}</div>
                            <p class="text-md">{{ $event->date_of_event }} at {{ $event->time_of_event }}</p>
                            <p class="text-md">{{ $event->place->name }}</p>
                        </div>
                        <div class="px-6 pb-2">
                            <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}"
                                class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </body>
@endsection