<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;
use Storage;
use Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()
                        ->where('approved', true) 
                        ->take(9)
                        ->get(); // Fetch events from the database

        return view('events', compact('events'));
    }

    public function event_detail($id, Request $request)
    {
        $referrer = $request->headers->get('referer'); // Get the URL of the previous page
        $backButtonLink = route('events.index'); // Default back button link
        
        if (strpos($referrer, 'events')) {
            $backButtonLink = route('events.index');
        } else if (strpos($referrer, 'search_categories')) {
            $backButtonLink = route('events.search_categories');
        } elseif (preg_match('/\/user\/\d+/', $referrer)) {
            $backButtonLink = route('user.show', ['id' => Auth::user()->id]);
        } elseif (strpos($referrer, 'approve')) {
            $backButtonLink = route('approve');
        }

        $event = Event::findOrFail($id); // Fetch the event by its ID

        return view('event_detail', ['event' => $event, 'backButtonLink' => $backButtonLink]);
    }

    public function search_categories()
    {
        $categories = Category::all(); // Fetch categories from the database
        $categories = Category::orderBy('name', 'asc')->get();

        return view('search_categories', compact('categories'));
    }

    public function category_page($id)
    {
        $selectedCategory = Category::findOrFail($id); // Fetch the category by its ID
        $categories = Category::all(); // Fetch categories from the database
        $categories = Category::orderBy('name', 'asc')->get();

        $events = $selectedCategory->events()
                ->where('approved', true)
                ->get();

        return view('category', compact('selectedCategory', 'categories', 'events'));
    }

    public function create_request()
    {
        return view('create_request');
    }

    public function place_detail($id, $name)
    {
        $place = Place::findOrFail($id); // Fetch the place by its ID

        return view('place_detail', compact('place'));
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
                'capacity' => 'required|numeric',
                'description' => 'required|string',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg',
            ], [
                'event_name.unique' => 'Názov udalosti je už obsadený. Prosím, vyberte si unikátny názov.',
                'date_of_event.after_or_equal' => 'Dátum udalosti musí byť v budúcnosti.',
            ]);

            // Store the photo
            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('event_photos', 'public');
                $validatedData['photo'] = basename($imagePath);
            } else {
                $validatedData['photo'] = null;
            }

            // Set the organiser to the currently logged in user
            $validatedData['organiser'] = Auth::user()->id;

            // Create a new event using the validated data
            Event::create($validatedData);

            // Redirect back or wherever you want after the event is created
            return redirect()->route('events.index')->with('success', 'Žiadosť bola úspešne vytvorená! Počkajte na schválenie.');
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
        return redirect()->route('events.index')->with('success', 'Žiadosť bola úspešne vytvorená! Počkajte na schválenie.');
    }

    public function store_place(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|unique:places,name',
            'address' => 'required|string|unique:places,address',
            'description' => 'required|string',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
        ], [
            'name.unique' => 'Názov miesta je už obsadený. Prosím, vyberte si unikátny názov.',
            'address.unique' => 'Adresa miesta je už obsadená. Prosím, vyberte si unikátnu adresu.',
        ]);

        // Store the photo
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('place_photos', 'public');
            $validatedData['photo'] = basename($imagePath);
        } else {
            $validatedData['photo'] = null;
        }

        // Create a new place using the validated data
        Place::create($validatedData);

        // Redirect back or wherever you want after the place is created
        return redirect()->route('events.index')->with('success', 'Žiadosť bola úspešne vytvorená! Počkajte na schválenie.');
    }

    public function registerOnEvent(Request $request, $eventId, $name)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('events.show', ['id' => $eventId, 'name' => $name])->with('error', 'Iba prihlásený žívatelia sa môžu registrovať na udalosti.');
        }

        $event = Event::find($eventId);
        $event->users()->attach($user->id);

        return redirect()->route('events.show', ['id' => $eventId, 'name' => $name])->with('success', 'Boli ste úspešne registrovaný na túto udalosť.');
    }

    public function unregisterFromEvent(Request $request, $eventId, $name)
    {
        $user = Auth::user();

        $event = Event::find($eventId);
        $event->users()->detach($user->id);

        return redirect()->route('events.show', ['id' => $eventId, 'name' => $name])->with('success', 'Boli ste úspešne odregistrovaný z tejto udalosti.');
    }

    public function edit_event($id)
    {
        $event = Event::findOrFail($id); 
        $categories = Category::all();
        $places = Place::all();

        return view('edit_event', compact('event', 'categories', 'places'));
    }

    public function update_event(Request $request, $id)
    {
        $validatedData = $request->validate([
            'event_name' => 'required|string',
            'date_of_event' => 'required|date|after_or_equal:today',
            'time_of_event' => 'required',
            'place_of_event' => 'required|exists:places,id',
            'entry_fee' => 'nullable|numeric',
            'category' => 'required|exists:categories,id',
            'capacity' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg',
        ], [
            'date_of_event.after_or_equal' => 'Dátum udalosti musí byť v budúcnosti.',
        ]);


        // Store the photo
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('event_photos', 'public');
            $validatedData['photo'] = basename($imagePath);
        } 

        $event = Event::findOrFail($id);

        if ($validatedData['event_name']) {
            $event->event_name = $validatedData['event_name'];
        }

        if ($validatedData['date_of_event']) {
            $event->date_of_event = $validatedData['date_of_event'];
        }

        if ($validatedData['time_of_event'] && $event->time_of_event != $validatedData['time_of_event']) {
            // Check time only if the date is today
            if ($validatedData['date_of_event'] == now()->format('d.m.Y') && strtotime($validatedData['time_of_event']) < strtotime(now()->format('H:i'))) {
                return back()->withErrors(['time_of_event' => 'Čas udalosti musí byť v budúcnosti.']);
            }
            $event->time_of_event = $validatedData['time_of_event'];
        }

        if ($validatedData['place_of_event']) {
            $event->place_of_event = $validatedData['place_of_event'];
        }

        if ($validatedData['entry_fee']) {
            $event->entry_fee = $validatedData['entry_fee'];
        }

        if ($validatedData['category']) {
            $event->category = $validatedData['category'];
        }

        if ($validatedData['capacity']) {
            $event->capacity = $validatedData['capacity'];
        }

        if ($validatedData['description']) {
            $event->description = $validatedData['description'];
        }

        $event->save();

        // Redirect back or wherever you want after the event is created
        return redirect()->route('user.show', ['id' => Auth::id()])->with('success', 'Udalosť bola úspešne upravená.');
    }
}