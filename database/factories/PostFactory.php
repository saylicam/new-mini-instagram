<?php

namespace Database\Factories;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Associe un utilisateur
            'content' => $this->faker->sentence(), // Contenu aléatoire
        ];
    }
}

