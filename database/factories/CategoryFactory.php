<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['Vzdelávanie', 'Hudba a koncerty', 'Nočný život', 'Kultúra', 'Kvízy a hry', 'Gastronómia', 'Šport', 'Technológia', 'Zdravie', 'Cestovanie'];
        return [
            'name' => $this->faker->unique()->randomElement($names),
            'approved' => $this->faker->boolean(true),
        ];
    }
}
