<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livreurs>
 */
class LivreursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'ville' => $this->faker->city,
            'date_embauche' => $this->faker->date(),
        ];
    }
}
