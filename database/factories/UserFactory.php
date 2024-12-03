<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(), // Ajout du username unique
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Mot de passe par défaut
            'bio' => $this->faker->sentence(), // Optionnel : Génère une bio aléatoire
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'), // Optionnel : Image de profil
            'remember_token' => Str::random(10),
        ];
    }
}

