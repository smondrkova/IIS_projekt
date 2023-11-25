<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        Place::factory(20)->create();
        User::factory(10)->create();
        Event::factory(20)->create();
    }
}
