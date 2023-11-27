<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Storage;

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

        $photo = 'placeholders/place1.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 1,
            'name' => 'Park Zelený háj',
            'address' => 'Parková 12, Košice, Slovensko',
            'photo' => basename($photo),
            'description' => 'Raj pre lásku k prírode, Park Zelený háj vás privíta svojou nádhernou zeleňou a jazierkami.',
        ]);
    }
}

class Place2Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place2.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 2,
            'name' => 'Hviezdná kaviareň',
            'address' => 'Kávová 10, Bratislava, Slovensko',
            'photo' => basename($photo),
            'description' => 'Hviezdná kaviareň je miestom, kde sa stretáva vášeň pre kávu a príjemné prostredie. Očarujte svoje chuťové poháriky najlepšími kávovými delikatesami v meste.',
        ]);
    }
}

class Place3Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place3.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 3,
            'name' => 'Reštaurácia u prístavu',
            'address' => 'Pobrežná 67, Bratislava, Slovensko',
            'photo' => basename($photo),
            'description' => 'S romantickým výhľadom na prístav je naša reštaurácia miestom pre tých, čo milujú kulinárske zážitky a atmosféru s pohľadom na trblietkajúcu hladinu.',
        ]);
    }
}

class Place4Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place4.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 4,
            'name' => 'Penzión Horský úkryt',
            'address' => 'Vrcholová 2, Poprad, Slovensko',
            'photo' => basename($photo),
            'description' => 'Vitajte v útulnom penzióne Horský úkryt, kde príroda a pohodlie idú ruka v ruke. Ideálné pre tých, čo hľadajú oddych v horskom prostredí.',
        ]);
    }
}

class Place5Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place5.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 5,
            'name' => 'Inovačné centrum TechHub',
            'address' => 'Technické námestie 2, Košice, Slovensko',
            'photo' => basename($photo),
            'description' => 'TechHub je epicentrom inovácií a technologického pokroku. Spoľahnite sa na stimulujúce prostredie pre výskum a rozvoj najnovších technologických trendov.',
        ]);
    }
}

class Place6Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place6.jpeg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));

        Place::create([
            'id' => 6,
            'name' => 'Spa a Wellness Kľud',
            'address' => 'Pokojná 4, Piešťany, Slovensko',
            'photo' => basename($photo),
            'description' => 'Spa a Wellness Kľud je útočiskom pre relaxáciu a obnovu tela aj mysle. Ponúkame širokú škálu wellness služieb pre dokonalý oddych.',
        ]);
    }
}

class Place7Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place7.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 7,
            'name' => 'OC Galaxy',
            'address' => 'Hviezdna 34, Bratislava, Slovensko',
            'photo' => basename($photo),
            'description' => 'OC Galaxy - Mekka pre nakupovanie, zábavu a gastronomické potešenie. Tu sa stretáva svetový spôsob života s moderným štýlom nakupovania.',
        ]);
    }
}

class Place8Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place8.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 8,
            'name' => 'Historické námestie',
            'address' => 'Ulica odkazu 1, Banská Bystrica, Slovensko',
            'photo' => basename($photo),
            'description' => 'Historické námestie je pokladnicou minulosti s krásnymi historickými budovami a úzkymi uličkami. Ideálne pre tých čo túžia po kúsku histórie.',
        ]);
    }
}

class Place9Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place9.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 9,
            'name' => 'Camp Dobrodrúžstvo',
            'address' => 'Dobrodružná 38, Liptovský Mikuláš, Slovensko',
            'photo' => basename($photo),
            'description' => 'Camp Dobrodrúžstvo je výchozím bodom pre dobrodružstvo v prírode. Kým si budete užívať kempovanie, objavujte okolitú prírodu a adrenalínové aktivity.',
        ]);
    }
}

class Place10Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place10.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 10,
            'name' => 'Observatórium Skyline',
            'address' => 'Hviezdna 5, Košice, Slovensko',
            'photo' => basename($photo),
            'description' => 'S výhľadom na mesto, observatórium Skyline ponúka úchvatné pohľady na nočné nebo. Ideálne pre všetkých čo milujú hviezdne pozorovanie.',
        ]);
    }
}

class Place11Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place11.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 11,
            'name' => 'Reštaurácia Spojená chuť',
            'address' => 'Dunajská 2, Bratislava, Slovensko',
            'photo' => basename($photo),
            'description' => 'Restaurace Spojená chuť spája chute z celého sveta v jedinečných kulinárskych kompozíciách.',
        ]);
    }
}

class Place12Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place12.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 12,
            'name' => 'Kníhkupéctvo & Kaviareň Harmony',
            'address' => 'Literárna 7, Bratislava, Slovensko',
            'photo' => basename($photo),
            'description' => 'Kníhkupéctvo & Kaviareň Harmony je útulné miesto pre knihomolov a milovníkov kávy. Čítajte obľúbené knihy pri šálke kvalitnej kávy.',
        ]);
    }
}

class Place13Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place13.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 13,
            'name' => 'Mestská galéria umenia',
            'address' => 'Kultúrna 2, Košice, Slovensko',
            'photo' => basename($photo),
            'description' => 'Mestská galéria umenia je priestor pre kreatívnu sebarealizáciu a zážitok z moderného umenia. Ponúka výstavy a podporuje miestnych umelcov.',
        ]);
    }
}

class Place14Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place14.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 14,
            'name' => 'Rekreačný resort na Brehu Jazera',
            'address' => 'Pobrežná 1, Štrbské Pleso, Slovensko',
            'photo' => basename($photo),
            'description' => 'Rekreačný resort na Brehu Jazera je miesto pre oddych a relaxáciu pri brehu jazera. Užívajte si nádherný výhľad a komfort našich ubytovacích zariadení.',
        ]);
    }
}

class Place15Seeder extends Seeder 
{
    public function run()
    {

        $photo = 'placeholders/place15.jpg';
        Storage::disk('public')->put('place_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Place::create([
            'id' => 15,
            'name' => 'Jazzový klub',
            'address' => 'Hlavná 1, Žilina, Slovensko',
            'photo' => basename($photo),
            'description' => 'Náš Jazzový klub je živý klub, kde sa stretáva komunita jazzových nadšencov. Každý deň je tu plný hudobnej energie a vášne pre jazz.',
        ]);
    }
}

class Event1Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event1.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 1,
            'event_name' => 'Upratovanie parku Zelený háj',
            'date_of_event' => '2024-05-01',
            'time_of_event' => '10:00:00',
            'place_of_event' => 1,
            'entry_fee' => 0,
            'category' => 9,
            'description' => 'Pridajte sa k nám na upratovaní parku Zelený háj. Budeme zbierať odpadky a sadiť stromy.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event2Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event2.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 2,
            'event_name' => 'Noc poézie a kávových delikates',
            'date_of_event' => '2024-06-10',
            'time_of_event' => '20:00:00',
            'place_of_event' => 2,
            'entry_fee' => 8,
            'category' => 4,
            'description' => 'Večer poetických prejavov a aromatického espressa.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event3Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event3.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 3,
            'event_name' => 'Fantázia morských plodov',
            'date_of_event' => '2024-07-15',
            'time_of_event' => '19:00:00',
            'place_of_event' => 3,
            'entry_fee' => 50,
            'category' => 6,
            'description' => 'Oslnite svoje chuťové buňky našimi najčerstvejšími úlovkami a ohromujúcim výhľadom na prístav.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event4Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event4.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 4,
            'event_name' => 'Sledovanie hviezd pri ohnisku',
            'date_of_event' => '2024-08-05',
            'time_of_event' => '21:00:00',
            'place_of_event' => 4,
            'entry_fee' => 0,
            'category' => 10,
            'description' => 'Pridajte sa k nám na kúzelnú noc pod hviezdami. Užite si ohnisko, horúcu čokoládu a odborné sledovanie hviezd.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event5Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event5.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 5,
            'event_name' => 'TechCon 2023',
            'date_of_event' => '2024-09-01',
            'time_of_event' => '10:00:00',
            'place_of_event' => 5,
            'entry_fee' => 25,
            'category' => 8,
            'description' => 'Preskúmajte najnovšie technológie a inovácie na tohtoročnom TechCone. Spojte sa s osobnosťami a vizionármi technického odvetvia.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event6Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event6.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 6,
            'event_name' => 'Workshop meditácie',
            'date_of_event' => '2024-10-12',
            'time_of_event' => '15:30:00',
            'place_of_event' => 6,
            'entry_fee' => 15,
            'category' => 9,
            'description' => 'Ponorte sa do pokoja s naším workshopom venujúcim sa meditácii. Oživte si myseľ a telo.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event7Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event7.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 7,
            'event_name' => 'Nočná šialenosť v OC Galaxy',
            'date_of_event' => '2023-12-20',
            'time_of_event' => '0:00:00',
            'place_of_event' => 7,
            'entry_fee' => 0,
            'category' => 3,
            'description' => 'Ponorte sa do šialenstva nakupovania s exkluzívnymi zľavami a ponukami našich nočných šialenstiev. Nakupujte, dokým neodpadnete!',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event8Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event8.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 8,
            'event_name' => 'Historická túra',
            'date_of_event' => '2023-12-05',
            'time_of_event' => '14:00:00',
            'place_of_event' => 8,
            'entry_fee' => 10,
            'category' => 4,
            'description' => 'Posuňte sa späť v čase s našou prehliadkovou historickou túrou. Preskúmajte bohaté dedičstvo oblasti prostredníctvom jej historických ulíc.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event9Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event9.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 9,
            'event_name' => 'Vonkajšia filmová noc',
            'date_of_event' => '2024-01-18',
            'time_of_event' => '19:30:00',
            'place_of_event' => 9,
            'entry_fee' => 10,
            'category' => 4,
            'description' => 'Uložte sa pod nočnú oblohu na vonkajšie premietanie klasického dobrodružného filmu. Prineste si deky a popcorn!',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event10Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event10.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 10,
            'event_name' => 'Workshop fotografie nočnej oblohy',
            'date_of_event' => '2024-02-22',
            'time_of_event' => '20:00:00',
            'place_of_event' => 10,
            'entry_fee' => 30,
            'category' => 8,
            'description' => 'Zachyťte krásu nočnej oblohy s našími odborníkmi na fotografovanie na observatóriu Skyline.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event11Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event11.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 11,
            'event_name' => 'Noc spojených chutí',
            'date_of_event' => '2024-03-15',
            'time_of_event' => '18:00:00',
            'place_of_event' => 11,
            'entry_fee' => 40,
            'category' => 6,
            'description' => 'Ponorte sa do kulinárného zážitku s naším špeciálnym menu, ktoré kombinuje chute z celého sveta.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event12Seeder extends Seeder
{
    public function run()
    {
        
        $photo = 'placeholders/event12.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 12,
            'event_name' => 'Stretnutie s autormi',
            'date_of_event' => '2024-04-10',
            'time_of_event' => '16:00:00',
            'place_of_event' => 12,
            'entry_fee' => 0,
            'category' => 4,
            'description' => 'Stretnite svojich obľúbených autorov, nechajte si podpísať knihy a užívajte si útulné popoludnie v kníhkupectve a kaviarni Harmony.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event13Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event13.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 13,
            'event_name' => 'Festival pouličného umenia',
            'date_of_event' => '2024-05-05',
            'time_of_event' => '12:00:00',
            'place_of_event' => 13,
            'entry_fee' => 0,
            'category' => 4,
            'description' => 'Ponorte sa do sveta živého pouličného umenia s živými predstaveniami.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event14Seeder extends Seeder
{
    public function run()
    {

        $photo = 'placeholders/event14.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 14,
            'event_name' => 'Jazzova grilovačka pri jazere',
            'date_of_event' => '2024-06-20',
            'time_of_event' => '19:30:00',
            'place_of_event' => 14,
            'entry_fee' => 25,
            'category' => 2,
            'description' => 'Užite si večer hudby, vynikajúceho jedla a ohromujúceho výhľadu v našom resorte.',
            'photo' => basename($photo),
            'approved' => true,
        ]);
    }
}

class Event15Seeder extends Seeder
{
    public function run()
    {
        
        $photo = 'placeholders/event15.jpg';
        Storage::disk('public')->put('event_photos/' . basename($photo), file_get_contents(public_path($photo)));
    
        Event::create([
            'id' => 15,
            'event_name' => 'Jazzový večer',
            'date_of_event' => '2024-07-10',
            'time_of_event' => '21:00:00',
            'place_of_event' => 15,
            'entry_fee' => 15,
            'category' => 2,
            'description' => 'Užite si noc jazzovej hudby, od klasiky po súčasnosť.',
            'photo' => basename($photo),
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
