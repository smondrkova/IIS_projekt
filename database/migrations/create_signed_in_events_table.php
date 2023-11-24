<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->json('signed_in_events')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('signed_in_events');
        });
    }
};

// To add a user ID to the 'signed_up_users' column in the 'events' table when a user signs up for an event, you'll need to perform an update on the corresponding row in the 'events' table.
// Assuming you have a model for the 'Event' and 'User' Eloquent models, and you're using Laravel, you can use the update method to add the user ID to the 'signed_up_users' column.

// Here's a basic example:
// <?php
// use App\Models\Event;
// use App\Models\User;

// // Assuming $eventId is the ID of the event and $userId is the ID of the user signing up
// $event = Event::find($eventId);

// // Retrieve the current signed_up_users array (or initialize as an empty array if it's null)
// $signedUpUsers = $event->signed_up_users ?? [];

// // Add the new user ID to the array
// $signedUpUsers[] = $userId;

// // Update the 'signed_up_users' column in the events table
// $event->update(['signed_up_users' => $signedUpUsers]);

// This example assumes that the 'signed_up_users' column in the 'events' table is a JSON array. If you're using a different format or structure, you'll need to adjust the code accordingly.
// Remember to handle error checking and ensure that the user and event IDs are valid before attempting to update the 'signed_up_users' column.