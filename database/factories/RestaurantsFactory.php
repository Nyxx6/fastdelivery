<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurants>
 */
class RestaurantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->company,
            'note' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->randomElement(['Fast Food', 'Fine Dining', 'Casual Dining', 'Cafe']),
            'region' => $this->faker->city,
        ];
    }
}
