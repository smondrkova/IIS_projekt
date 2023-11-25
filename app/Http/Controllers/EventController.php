<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(9)->get(); // Fetch events from the database

        return view('events', compact('events'));
    }

    public function event_detail($id, Request $request)
    {
        $referrer = $request->headers->get('referer'); // Get the URL of the previous page

        if (strpos($referrer, 'events')) {
            $backButtonLink = route('events.index');
        } else if (strpos($referrer, 'search_categories')) {
            $backButtonLink = route('events.search_categories');
        } 

        $event = Event::findOrFail($id); // Fetch the event by its ID

        return view('event_detail', compact('event'));
    }

    public function search_categories()
    {
        $categories = Category::all(); // Fetch categories from the database

        return view('search_categories', compact('categories'));
    }

    public function category_page($id)
    {
        $selectedCategory = Category::findOrFail($id); // Fetch the category by its ID
        $categories = Category::all(); // Fetch categories from the database

        return view('category', compact('selectedCategory', 'categories'));
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


}