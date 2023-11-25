<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get(); // Fetch events from the database

        return view('events', compact('events'));
    }

    public function show($id, $name)
    {
        $event = Event::findOrFail($id); // Fetch the event by its ID

        return view('event_detail', compact('event'));
    }

    public function search()
    {
        return view('search');
    }

    public function create_request()
    {
        return view('create_request');
    }
}