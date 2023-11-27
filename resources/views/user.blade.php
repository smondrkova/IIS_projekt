<!-- resources/views/user.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UdaloMánia</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

@extends('layouts.app')  

@section('content')
    <div class="container p-8 pl-20">
        <h1 class="text-2xl font-bold mb-4">Môj profil</h1>
        <br>
        <p><strong>Meno:</strong> {{ $user->name }}</p>
        <p><strong>Priezvisko:</strong> {{ $user->surname }}</p>
        <p><strong>Email:</strong> {{ $user->email}}</p>
        <p><strong>Telefón:</strong> {{ $user->phone_number }}</p>
        <br>
        <div style="display: flex; gap: 8px">
            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Upraviť profil</a>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Odhlásiť sa</button>
            </form>
        </div>
        <br><br>
        <h1 class="text-2xl font-bold mb-4">Moje vytvorené udalosti</h1>
        @if($user->organized_events->isNotEmpty())
            <div style="display: flex; flex-direction: column; gap: 10px;">
                @foreach($user->organized_events as $event)
                    <div style="display: flex; gap: 15px; align-items: center;border: 3px solid #608da2; width:650px; border-radius: 5px;" class="mb-4 pl-5  p-2">
                        <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}" style="width: 300px;" class="font-bold">{{ $event->event_name }}</a>
                        <span>{{ \Carbon\Carbon::parse($event->date_of_event)->format('d.m.Y') }}</span>
                        <span>{{ \Carbon\Carbon::parse($event->time_of_event)->format('H:i') }}</span>
                        
                        <form method="POST" action="{{ route('delete_event_from_catalog', ['id' => $event->id, 'name' => $event->event_name]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-not" onclick="return confirm('Ste si istý, že chcete vymazať danú udalosť?')">Vymazať</button>
                        </form>

                        <a href="{{ route('events.edit_event', ['id' => $event->id, 'name' => $event->event_name]) }}" class="btn btn-primary">Upraviť</a>
                        @if($event->approved == 0)
                            <p>Čaká na schválenie</p>
                        @else
                            <strong>Zverejnená</strong>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p>Aktuálne neorganizujete žiadne udalosti.</p>
        @endif

        <br><br>

        <h1 class="text-2xl font-bold mb-4">Moje registrované udalosti</h1>

        @if($user->events->isNotEmpty())
            <div style="display: flex; flex-direction: column; gap: 10px;">
                @php
                    $groupedEvents = $user->events->groupBy(function($event) {
                        $carbonDate = \Carbon\Carbon::parse($event->date_of_event);
                        if ($carbonDate->isToday()) {
                            return 'today';
                        } elseif ($carbonDate->isTomorrow()) {
                            return 'tomorrow';
                        } elseif ($carbonDate->isNextWeek()) {
                            return 'next_week';
                        } elseif ($carbonDate->isNextMonth()) {
                            return 'next_month';
                        } else {
                            return 'later';
                        }
                    });
                @endphp

                @foreach(['today', 'tomorrow', 'next_week', 'next_month', 'later'] as $group)
                    @if($groupedEvents->has($group))
                        <h2 class="text-xl font-bold">
                            @if($group === 'today')
                                Dnes
                            @elseif($group === 'tomorrow')
                                Zajtra
                            @elseif($group === 'next_week')
                                Nabudúci týždeň
                            @elseif($group === 'next_month')
                                Nabudúci mesiac
                            @else
                                Neskôr
                            @endif
                        </h2>

                        @foreach($groupedEvents[$group] as $event)
                            <div style="display: flex; gap: 15px; align-items: center;border: 3px solid #0c151b; width:650px; border-radius: 5px;" class="mb-4 pl-5 p-2">
                                <a href="{{ route('events.show', ['id' => $event->id, 'name' => $event->event_name]) }}" style="width: 320px;" class="font-bold">{{ $event->event_name }}</a>
                                <span>{{ \Carbon\Carbon::parse($event->date_of_event)->format('d.m.Y') }}</span>
                                <span>{{ \Carbon\Carbon::parse($event->time_of_event)->format('H:i') }}</span>
                                
                                <form method="POST" action="{{ route('events.unregister', ['id' => $event->id, 'name' => $event->event_name]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-not">Odregistrovať sa</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @else
            <p>Aktuálne nie ste zaregistrovaný na žiadne udalosti.</p>
        @endif

    </div>
@endsection