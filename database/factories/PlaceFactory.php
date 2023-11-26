<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->city,
            'address' => $this->faker->unique()->address,
            'description' => $this->faker->text,
            'photo' => $this->faker->word,
            'approved' => $this->faker->boolean(true),
        ];
    }
}
