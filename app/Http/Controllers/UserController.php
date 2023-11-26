<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Auth;
use Hash;
use Carbon\Carbon;

class UserController extends Controller
{ 
    public function show($id)
    {
        $user = User::findOrFail($id);

        $eventsByDate = $this->organizeEventsByDate($user->events);

        return view('user', compact('user', 'eventsByDate'));
    }

    private function organizeEventsByDate($events)
    {
        return $events->sortBy('date_of_event')->groupBy(function($event) {
            return Carbon::parse($event->date_of_event)->format('Y-m-d');
        });
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's attributes if the fields are not empty
    if ($validatedData['name']) {
        $user->name = $validatedData['name'];
    }

    if ($validatedData['surname']) {
        $user->surname = $validatedData['surname'];
    }

    if ($validatedData['email']) {
        $user->email = $validatedData['email'];
    }

    if (array_key_exists('phone_number', $validatedData)) {
        $user->phone_number = $validatedData['phone_number'];
    }

    // Update the password if provided
    if (!is_null($validatedData['password'])) {
        $user->password = bcrypt($validatedData['password']);
    }

        // Save the changes
        $user->save();

        return redirect()->route('user.show', ['id' => $id])->with('success', 'Profil bol úspešne upravený.');
    }

    public function approve()
    {
        $events = Event::where('approved', false)->get();
        $categories = Category::where('approved', false)->get();
        $places = Place::where('approved', false)->get();
        return view('approve', compact('events', 'categories', 'places'));
    }

    public function approveEvent($id)
    {
        $event = Event::find($id);
        $event->approved = true;
        $event->save();

        return redirect()->route('approve')->with('success', 'Event bol úspešne schválený.');
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('approve')->with('success', 'Event bol úspešne zmazaný.');
    }

    public function approvePlace($id)
    {
        $place = Place::find($id);
        $place->approved = true;
        $place->save();

        return redirect()->route('approve')->with('success', 'Miesto bolo úspešne schválené.');
    }

    public function deletePlace($id)
    {
        $place = Place::find($id);
        $place->delete();

        return redirect()->route('approve')->with('success', 'Miesto bolo úspešne zmazané.');
    }

    public function approveCategory($id)
    {
        $category = Category::find($id);
        $category->approved = true;
        $category->save();

        return redirect()->route('approve')->with('success', 'Kateória bola úspešne schválená.');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('approve')->with('success', 'Kateória bola úspešne zmazaná.');
    }

    public function manageUsers()
    {
        $users = User::where('id', '>', 5)->get();
        return view('manage_users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user)
        {
            $user->delete();
            return redirect()->route('manage_users')->with('success', 'User deleted successfully!');
        } else {
            return redirect()->route('manage_users')->with('error', 'User not found!');
        }
    }

}