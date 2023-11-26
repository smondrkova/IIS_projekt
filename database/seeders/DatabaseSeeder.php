<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@udalomania.com',
            'password' => Hash::make('AdminPassword'),
            'remember_token' => Str::random(10),
        ]);
    }
}

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 2,
            'name' => 'Moderator',
            'surname' => 'User',
            'email' => 'moderator@udalomania.com',
            'password' => Hash::make('ModeratorPassword'),
            'remember_token' => Str::random(10),
        ]);
    }
}

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ModeratorSeeder::class,
        ]);

        Category::factory(10)->create();
        Place::factory(20)->create();
        User::factory(10)->create();
        Event::factory(20)->create();
    }
}
