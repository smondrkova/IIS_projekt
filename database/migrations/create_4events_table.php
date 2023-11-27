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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('date_of_event');
            $table->time('time_of_event');
            $table->foreignId('place_of_event')->constrained('places')->onDelete('cascade'); // Foreign key to the 'places' table.
            $table->float('entry_fee')->nullable();
            $table->foreignId('category')->constrained('categories')->onDelete('cascade'); // Foreign key to the 'categories' table.
            $table->text('description');
            $table->string('photo')->nullable(); // Assuming the photo is a string representing the file path or URL.
            $table->boolean('approved')->default(false);
            $table->foreignId('organiser')->constrained('users')->onDelete('cascade'); // Foreign key to the 'users' table.
            $table->float("capacity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['place_of_event', 'category', 'organiser']);
        });

        Schema::dropIfExists('events');
    }
};

