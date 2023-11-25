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
        $names = ['Education', 'Music', 'Night life', 'Culture', 'Games', 'Food', 'Health', 'Sports', 'Technology', 'Travel'];
        return [
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
