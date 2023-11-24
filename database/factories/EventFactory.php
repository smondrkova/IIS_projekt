<?php

namespace Database\Factories;

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
        return [
            'event_name' => $this->faker->word,
            'date_of_event' => $this->faker->date(),
            'time_of_event' => $this->faker->time(),
            'place_of_event' => $this->faker->word,
            'entry_fee' => $this->faker->randomFloat(2, 0, 9999999999.99),
            'category' => $this->faker->word,
            'description' => $this->faker->text,
            'photo' => $this->faker->word,
        ];
    }
}
