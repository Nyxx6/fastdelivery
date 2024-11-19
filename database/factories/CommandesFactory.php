<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Produits;
use App\Models\Livreurs;
use App\Models\Restaurants;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commandes>
 */
class CommandesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_produit' => Produits::factory()->create()->id,
            'id_livreur' => Livreurs::factory()->create()->id,
            'id_restaurant' => Restaurants::factory()->create()->id,
            'id_utilisateur' => User::factory()->create()->id,
            'prix' => $this->faker->randomNumber(4),
        ];
    }
}
