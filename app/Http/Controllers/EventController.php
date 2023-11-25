<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Place;

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
        $categories = Category::all();
        $places = Place::all();
        return view('create_request', compact('categories', 'places'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'event_name' => 'required|string|unique:events,event_name',
            'date_of_event' => 'required|date|after_or_equal:today',
            'time_of_event' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) use ($request) {
                    // Check time only if the date is today
                    if ($request->input('date_of_event') == now()->format('Y-m-d') && strtotime($value) < strtotime(now()->format('H:i'))) {
                        $fail('The time of event must be in the future.');
                    }
                },
            ],
            'place_of_event' => 'required|exists:places,id',
            'entry_fee' => 'nullable|numeric',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string',
            'photo' => 'nullable|string',
        ], [
            'event_name.unique' => 'The event name is already taken. Please choose a unique name.',
            'date_of_event.after_or_equal' => 'The date of event must be in the future.',
            'time_of_event.after_or_equal' => 'The time of event must be in the future.',
        ]);

        // Create a new event using the validated data
        Event::create($validatedData);

        // Redirect back or wherever you want after the event is created
        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }
}