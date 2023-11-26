<?php

namespace Database\Factories;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = $this->faker->unique()->randomElements(range(1, 10), 3);
        $placeId = Place::inRandomOrder()->value('id');
        $categoryId = Category::inRandomOrder()->value('id');

        return [
            'event_name' => $this->faker->word,
            'date_of_event' => $this->faker->date(),
            'time_of_event' => $this->faker->time(),
            'place_of_event' => $placeId,
            'entry_fee' => $this->faker->randomFloat(2, 0, 999.99),
            'category' => $categoryId,
            'description' => $this->faker->text,
            'photo' => $this->faker->word,
            'approved' => $this->faker->boolean(true),
        ];
    }
}
