<!-- resources/views/manage_users.blade.php -->

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
        <h2 class="text-2xl font-bold mb-4">Tabuľka používateľov:</h2>

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
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
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Email</th>
                    <th>Telefónne číslo</th>
                    <th class="text-center align-middle">Akcia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td class="text-center align-middle">
                            <form action="{{ route('delete_user', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" onclick="return confirm('Ste si istý, že chcete vymazať daného užívateľa?')">Vymazať</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection