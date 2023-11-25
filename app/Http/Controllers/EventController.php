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
        return view('create_request');
    }

    public function create_event()
    {
        $categories = Category::all();
        $places = Place::all();
        return view('create_event', compact('categories', 'places'));
    }

    public function create_category()
    {
        return view('create_category');
    }

    public function create_place()
    {
        return view('create_place');
    }

    public function store_event(Request $request)
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
                        $fail('Čas udalosti musí byť v budúcnosti.');
                    }
                },
            ],
            'place_of_event' => 'required|exists:places,id',
            'entry_fee' => 'nullable|numeric',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string',
            'photo' => 'nullable|string',
        ], [
            'event_name.unique' => 'Názov udalosti je už obsadený. Prosím, vyberte si unikátny názov.',
            'date_of_event.after_or_equal' => 'Dátum udalosti musí byť v budúcnosti.',
        ]);

        // Create a new event using the validated data
        Event::create($validatedData);

        // Redirect back or wherever you want after the event is created
        return redirect()->route('events.index')->with('success', 'Event úspešne vytvorený!');
    }

    public function store_category(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name',
        ], [
            'name.unique' => 'Názov kategórie je už obsadený. Prosím, vyberte si unikátny názov.',
        ]);

        // Create a new category using the validated data
        Category::create($validatedData);

        // Redirect back or wherever you want after the category is created
        return redirect()->route('events.index')->with('success', 'Katogória vytvorená úspešne!');
    }

    public function store_place(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|unique:places,name',
            'address' => 'required|string|unique:places,address',
            'description' => 'required|string',
            'photo' => 'nullable|string',
        ], [
            'name.unique' => 'Názov miesta je už obsadený. Prosím, vyberte si unikátny názov.',
            'address.unique' => 'Adresa miesta je už obsadená. Prosím, vyberte si unikátnu adresu.',
        ]);

        // Create a new place using the validated data
        Place::create($validatedData);

        // Redirect back or wherever you want after the place is created
        return redirect()->route('events.index')->with('success', 'Miesto udalosti vytvorené úspešne!');
    }
}