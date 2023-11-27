<!-- resources/views/manage_categories.blade.php -->

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
        <h2 class="text-2xl font-bold mb-4">Tabuľka kategórii</h2>

        <style>
            table {
                border-collapse: collapse;
                width: 60%;
            }

            th, td {
                padding: 15px;
                text-align: left;
                border: 1px solid #ddd; 
            }

            th {
                background-color: #f2f2f2; 
            }
        </style>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th class="text-center align-middle">Akcia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center align-middle">
                            <form action="{{ route('delete_category_from_catalog', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" onclick="return confirm('Ste si istý, že chcete vymazať danú kategóriu?')">Vymazať</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection