<!-- resources/views/event_detail.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/detail_page.css') }}">
</head>
 
@extends('layouts.app')  

@section('content')
    <div class="container">
        <div class="grid-container">
            <div class="grid-item image">
                <img src="{{ asset('placeholders/placeholder.jpg') }}" class="img-fluid" alt="{{ $event->event_name }}">
            </div>
            <div class="grid-item text">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-4xl font-bold">{{ $event->event_name }}</h1>
                        <br>
                        <p class="card-text">Dátum: {{ $event->date_of_event }}</p>
                        <p class="card-text">Čas: {{ $event->time_of_event }}</p>
                        <a href="{{ route('events.places', ['id' => $event->place->id, 'name' => $event->place->name]) }}" class="links">Miesto podujatia: {{ $event->place->name }}</a>
                        <p class="card-text">Vstupné: {{ $event->entry_fee ? '$'.$event->entry_fee : 'Free' }}</p>
                        <p class="card-text">Kategória: {{ $event->categories->name }}</p>
                        <br>
                        <p class="card-text">{{ $event->description }}</p>
                        <br>
                        <div class="button-container">
                            <a href="{{ route('events.index') }}" class="btn btn-primary">Späť</a>
                            <button id="registerButton" class="btn btn-primary">Registrovať sa</button>
                            <button id="odhlasitSaButton" class="btn btn-primary" style="display: none;">Odhlásiť sa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateButtonVisibility() {
            var registerButton = document.getElementById('registerButton');
            var odhlasitSaButton = document.getElementById('odhlasitSaButton');

            if (isLoggedIn() && !isRegisteredToTheEvent()) {
                registerButton.style.display = 'block';
                odhlasitSaButton.style.display = 'none';
            } else if (isLoggedIn() && isRegisteredToTheEvent() ) {
                registerButton.style.display = 'none';
                odhlasitSaButton.style.display = 'block';
            } else {
                registerButton.style.display = 'block';
                odhlasitSaButton.style.display = 'none';
            }
        }


        document.getElementById('registerButton').addEventListener('click', function() {
            if (isLoggedIn()) {
                alert('Boli ste úspešne zaregistrovaný na toto podujatie.\n');
            } else {
                alert('Musíte mať vytvorený profil a byť prihlásený, aby ste sa mohli zaregistrovať na toto podujatie.');
            }

            updateButtonVisibility();
        });

        document.getElementById('odhlasitSaButton').addEventListener('click', function() {
            if (isLoggedIn() && isRegisteredToTheEvent()) {
                alert('Boli ste úspešne odhlásený z tohto podujatia.\n');
            }

            updateButtonVisibility();
        });

        function isLoggedIn() {
            // Assuming you have a way to check if the user is signed in
            // You can use Laravel's authentication system for this
            // For example, if(Auth::check()) in Laravel
            // Replace this function with your actual check
            return true; // Replace with your actual check
        }

        function isRegisteredToTheEvent() {
            // Assuming you have a way to check if the user is registered
            // Replace this function with your actual check
            return true; // Replace with your actual check
        }
    </script>
@endsection

