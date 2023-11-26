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

class User1Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 6,
            'name' => 'Jakub',
            'surname' => 'Novák',
            'email' => 'jakub.novak@udalomania.com',
            'phone_number' => '+420123456789',
            'password' => Hash::make('Password1'),
            'remember_token' => 'gH2pFv9aLx',
        ]);
    }
}

class User2Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 7,
            'name' => 'Barbora',
            'surname' => 'Svobodová',
            'email' => 'barbora.svobodova@udalomania.com',
            'phone_number' => '+420234567890',
            'password' => Hash::make('Password2'),
            'remember_token' => 'yE8sR3wM0z',
        ]);
    }
}

class User3Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 8,
            'name' => 'Martin',
            'surname' => 'Procházka',
            'email' => 'martin.prochazka@udalomania.com',
            'phone_number' => '+420345678901',
            'password' => Hash::make('Password3'),
            'remember_token' => 'qB5oH1cJ7n',
        ]);
    }
}

class User4Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 9,
            'name' => 'Kateřina',
            'surname' => 'Dvořáková',
            'email' => 'katerina.dvorakova@udalomania.com',
            'phone_number' => '+420456789012',
            'password' => Hash::make('Password4'),
            'remember_token' => 'tZ4iX6uK2r',
        ]);
    }
}

class User5Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 10,
            'name' => 'Pavel',
            'surname' => 'Černý',
            'email' => 'pavel.cerny@udalomania.com',
            'phone_number' => '+420567890123',
            'password' => Hash::make('Password5'),
            'remember_token' => 'mD7lO9pQ3f',
        ]);
    }
}

class User6Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 11,
            'name' => 'Jana',
            'surname' => 'Kováčová',
            'email' => 'jana.kovacova@udalomania.com',
            'phone_number' => '+421123456789',
            'password' => Hash::make('Password6'),
            'remember_token' => 'aV1sY5gT8o',
        ]);
    }
}

class User7Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 12,
            'name' => 'Marek',
            'surname' => 'Krajčí',
            'email' => 'marek.krajci@udalomania.com',
            'phone_number' => '+421234567890',
            'password' => Hash::make('Password7'),
            'remember_token' => 'kC3xU6hR9w',
        ]);
    }
}

class User8Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 13,
            'name' => 'Eva',
            'surname' => 'Hrušovská',
            'email' => 'eva.hrusovska@udalomania.com',
            'phone_number' => '+421345678901',
            'password' => Hash::make('Password8'),
            'remember_token' =>  'bN0jI2eL4q',
        ]);
    }
}

class User9Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 14,
            'name' => 'Tomáš',
            'surname' => 'Mikuš',
            'email' => 'tomas.mikus@udalomania.com',
            'phone_number' => '+421456789012',
            'password' => Hash::make('Password9'),
            'remember_token' => 'oF9rP7uW5x',
        ]);
    }
}

class User10Seeder extends Seeder 
{
    public function run()
    {
        User::create([
            'id' => 15,
            'name' => 'Zuzana',
            'surname' => 'Vargová',
            'email' => 'zuzana.vargova@udalomania.com',
            'phone_number' => '+421567890123',
            'password' => Hash::make('Password10'),
            'remember_token' => 'gH2pFv9aLx',
        ]);
    }
}

class Place1Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 1,
            'name' => 'Green Oasis Park',
            'address' => '123 Forest Grove Avenue, Cityville, Country',
            'description' => 'Green Oasis Park is a serene nature retreat nestled in the heart of Cityville.',
        ]);
    }
}

class Place2Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 2,
            'name' => 'Stellar Coffee House',
            'address' => '456 Milky Way Street, Urbanscape, Country',
            'description' => 'Stellar Coffee House is a trendy urban cafe where locals gather to savor artisanal coffees and indulge in delicious pastries.',
        ]);
    }
}

class Place3Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 3,
            'name' => 'Harbor View Restaurant',
            'address' => '789 Oceanfront Drive, Coastal City, Country',
            'description' => 'Harbor View Restaurant offers breathtaking panoramic views of the ocean while serving exquisite seafood dishes.',
        ]);
    }
}

class Place4Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 4,
            'name' => 'Mountain Retreat Lodge',
            'address' => '101 Summit Trail, Alpine Village, Country',
            'description' => 'Nestled in the majestic Alpine Village, Mountain Retreat Lodge provides a cozy escape for nature enthusiasts.',
        ]);
    }
}

class Place5Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 5,
            'name' => 'TechHub Innovations Center',
            'address' => '202 Innovation Avenue, Techropolis, Country',
            'description' => 'TechHub is a cutting-edge innovation center where tech enthusiasts and entrepreneurs collaborate on groundbreaking projects.',
        ]);
    }
}

class Place6Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 6,
            'name' => 'Tranquil Spa & Wellness',
            'address' => '303 Serenity Lane, Zen City, Country',
            'description' => 'Tranquil Spa & Wellness is a haven for relaxation and rejuvenation.',
        ]);
    }
}

class Place7Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 7,
            'name' => 'Galaxy Mall',
            'address' => '404 Starlight Boulevard, Metropolis, Country',
            'description' => 'Galaxy Mall is a bustling shopping destination with a diverse range of shops and entertainment options.',
        ]);
    }
}

class Place8Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 8,
            'name' => 'Historic District Square',
            'address' => '505 Heritage Street, Old Town, Country',
            'description' => 'The Historic District Square is a charming area that preserves the architectural heritage of Old Town.',
        ]);
    }
}

class Place9Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 9,
            'name' => 'Adventure Peak Campground',
            'address' => '606 Summit Camp Road, Wilderness Valley, Country',
            'description' => 'Adventure Peak Campground is an outdoor enthusiast\'s paradise.',
        ]);
    }
}

class Place10Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 10,
            'name' => 'Skyline Observatory',
            'address' => '707 Celestial Heights, Skyline City, Country',
            'description' => 'Skyline Observatory offers a stunning 360-degree view of the cityscape.',
        ]);
    }
}

class Place11Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 11,
            'name' => 'Fusion Flavors Restaurant',
            'address' => '808 Culinary Street, Global Plaza, Country',
            'description' => 'Fusion Flavors Restaurant is a culinary gem that brings together diverse global cuisines.',
        ]);
    }
}

class Place12Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 12,
            'name' => 'Harmony Bookstore & Cafe',
            'address' => '909 Literary Lane, Bookish Borough, Country',
            'description' => 'Harmony Bookstore & Cafe is a haven for book lovers.',
        ]);
    }
}

class Place13Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 13,
            'name' => 'Urban Art Gallery',
            'address' => '1010 Creative Avenue, Artsy Town, Country',
            'description' => 'Urban Art Gallery showcases the works of local and international artists.',
        ]);
    }
}

class Place14Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 14,
            'name' => 'Lakeside Retreat Resort',
            'address' => '1111 Serene Shore Drive, Lakeside Haven, Country',
            'description' => 'Lakeside Retreat Resort offers a luxurious escape with waterfront views, spa facilities, and gourmet dining.',
        ]);
    }
}

class Place15Seeder extends Seeder 
{
    public function run()
    {
        Place::create([
            'id' => 15,
            'name' => 'Jazz Junction Club',
            'address' => '1212 Rhythm Street, Jazzville, Country',
            'description' => 'Jazz Junction Club is a vibrant music venue where live jazz performances take center stage.',
        ]);
    }
}

class Event1Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 1,
            'event_name' => 'Green Oasis Park Cleanup',
            'date_of_event' => '2024-05-01',
            'time_of_event' => '10:00:00',
            'place_of_event' => 1,
            'entry_fee' => 0,
            'category' => 9,
            'description' => 'Join us for a day of cleaning up Green Oasis Park. We will be picking up trash and planting trees.',
            'approved' => true,
        ]);
    }
}

class Event2Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 2,
            'event_name' => 'Poetry Night & Espresso Delights',
            'date_of_event' => '2024-06-10',
            'time_of_event' => '20:00:00',
            'place_of_event' => 2,
            'entry_fee' => 8,
            'category' => 4,
            'description' => 'An evening of poetic expressions and aromatic espresso.',
            'approved' => true,
        ]);
    }
}

class Event3Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 3,
            'event_name' => 'Seafood Extravaganza',
            'date_of_event' => '2024-07-15',
            'time_of_event' => '19:00:00',
            'place_of_event' => 3,
            'entry_fee' => 50,
            'category' => 6,
            'description' => 'Delight your taste buds with our Seafood Extravaganza featuring the freshest catches and a stunning view of the harbor.',
            'approved' => true,
        ]);
    }
}

class Event4Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 4,
            'event_name' => 'Stargazing Bonfire Night',
            'date_of_event' => '2024-08-05',
            'time_of_event' => '21:00:00',
            'place_of_event' => 4,
            'entry_fee' => 0,
            'category' => 10,
            'description' => 'Join us for a magical night under the stars. Enjoy a bonfire, hot cocoa, and an expert-led stargazing session.',
            'approved' => true,
        ]);
    }
}

class Event5Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 5,
            'event_name' => 'Tech Symposium 2023',
            'date_of_event' => '2024-09-01',
            'time_of_event' => '10:00:00',
            'place_of_event' => 5,
            'entry_fee' => 25,
            'category' => 8,
            'description' => 'Explore the latest in technology and innovation at TechHub\'s annual symposium. Engage with industry leaders and visionaries.',
            'approved' => true,
        ]);
    }
}

class Event6Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 6,
            'event_name' => 'Mindfulness Meditation Workshop',
            'date_of_event' => '2024-10-12',
            'time_of_event' => '15:30:00',
            'place_of_event' => 6,
            'entry_fee' => 15,
            'category' => 9,
            'description' => 'Immerse yourself in a day of serenity with our mindfulness meditation workshop. Rejuvenate your mind and body.',
            'approved' => true,
        ]);
    }
}

class Event7Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 7,
            'event_name' => 'Midnight Madness Sale',
            'date_of_event' => '2023-12-20',
            'time_of_event' => '0:00:00',
            'place_of_event' => 7,
            'entry_fee' => 0,
            'category' => 3,
            'description' => 'Dive into a shopping frenzy with exclusive discounts and deals at our Midnight Madness Sale.',
            'approved' => true,
        ]);
    }
}

class Event8Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 8,
            'event_name' => 'Historical Walking Tour',
            'date_of_event' => '2023-12-05',
            'time_of_event' => '14:00:00',
            'place_of_event' => 8,
            'entry_fee' => 10,
            'category' => 4,
            'description' => 'Step back in time with our guided historical walking tour.',
            'approved' => true,
        ]);
    }
}

class Event9Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 9,
            'event_name' => 'Outdoor Movie Night',
            'date_of_event' => '2024-01-18',
            'time_of_event' => '19:30:00',
            'place_of_event' => 9,
            'entry_fee' => 10,
            'category' => 4,
            'description' => 'Cozy up under the night sky for an outdoor screening of a classic adventure film.',
            'approved' => true,
        ]);
    }
}

class Event10Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 10,
            'event_name' => 'Celestial Photography Workshop',
            'date_of_event' => '2024-02-22',
            'time_of_event' => '20:00:00',
            'place_of_event' => 10,
            'entry_fee' => 30,
            'category' => 8,
            'description' => 'Capture the beauty of the night sky with our expert-led celestial photography workshop.',
            'approved' => true,
        ]);
    }
}

class Event11Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 11,
            'event_name' => 'Culinary Fusion Night',
            'date_of_event' => '2024-03-15',
            'time_of_event' => '18:00:00',
            'place_of_event' => 11,
            'entry_fee' => 40,
            'category' => 6,
            'description' => 'Indulge in a culinary journey with our special fusion menu, combining flavors from around the world.',
            'approved' => true,
        ]);
    }
}

class Event12Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 12,
            'event_name' => 'Author Meet & Greet',
            'date_of_event' => '2024-04-10',
            'time_of_event' => '16:00:00',
            'place_of_event' => 12,
            'entry_fee' => 0,
            'category' => 4,
            'description' => 'Meet your favorite authors, get your books signed, and enjoy a cozy afternoon of literary conversations.',
            'approved' => true,
        ]);
    }
}

class Event13Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 13,
            'event_name' => 'Street Art Festival',
            'date_of_event' => '2024-05-05',
            'time_of_event' => '12:00:00',
            'place_of_event' => 13,
            'entry_fee' => 0,
            'category' => 4,
            'description' => 'Immerse yourself in the vibrant world of street art with live demonstrations, graffiti displays, and interactive art installations.',
            'approved' => true,
        ]);
    }
}

class Event14Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 14,
            'event_name' => 'Lakeside Jazz Soiree',
            'date_of_event' => '2024-06-20',
            'time_of_event' => '19:30:00',
            'place_of_event' => 14,
            'entry_fee' => 25,
            'category' => 2,
            'description' => 'Enjoy an evening of lakeside jazz, fine dining, and breathtaking views.',
            'approved' => true,
        ]);
    }
}

class Event15Seeder extends Seeder
{
    public function run()
    {
        Event::create([
            'id' => 15,
            'event_name' => 'Jazz Fusion Night',
            'date_of_event' => '2024-07-10',
            'time_of_event' => '21:00:00',
            'place_of_event' => 15,
            'entry_fee' => 15,
            'category' => 2,
            'description' => 'Immerse yourself in a fusion of jazz styles, from classic to contemporary.',
            'approved' => true,
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
        Category::factory(10)->create();

        $this->call([
            // Seeding users table
            AdminSeeder::class,
            ModeratorSeeder::class,
            User1Seeder::class,
            User2Seeder::class,
            User3Seeder::class,
            User4Seeder::class,
            User5Seeder::class,
            User6Seeder::class,
            User7Seeder::class,
            User8Seeder::class,
            User9Seeder::class,
            User10Seeder::class,

            // Seeding places table
            Place1Seeder::class,
            Place2Seeder::class,
            Place3Seeder::class,
            Place4Seeder::class,
            Place5Seeder::class,
            Place6Seeder::class,
            Place7Seeder::class,
            Place8Seeder::class,
            Place9Seeder::class,
            Place10Seeder::class,
            Place11Seeder::class,
            Place12Seeder::class,
            Place13Seeder::class,
            Place14Seeder::class,
            Place15Seeder::class,
            
            // Seeding events table
            Event1Seeder::class,
            Event2Seeder::class,
            Event3Seeder::class,
            Event4Seeder::class,
            Event5Seeder::class,
            Event6Seeder::class,
            Event7Seeder::class,
            Event8Seeder::class,
            Event9Seeder::class,
            Event10Seeder::class,
            Event11Seeder::class,
            Event12Seeder::class,
            Event13Seeder::class,
            Event14Seeder::class,
            Event15Seeder::class,
        ]);

        // User::factory(10)->create();
        // Place::factory(20)->create();
        // Event::factory(20)->create();
    }
}
