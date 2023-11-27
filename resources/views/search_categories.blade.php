<!-- resources/views/search_categories.blade.php -->
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
                <p class="text-lg">Vyberte kategóriu pre zobrazenie udalostí.</p>
            </div>
        </div>

    </body>
@endsection

</html>