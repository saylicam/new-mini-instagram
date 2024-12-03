<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer 10 utilisateurs
        $users = User::factory(10)->create();

        // Pour chaque utilisateur, créer 5 posts
        $users->each(function ($user) {
            Post::factory(5)->create([
                'user_id' => $user->id,
                'content' => 'Contenu de test pour ' . $user->name,
            ]);
        });

        // Optionnel : Créer un utilisateur spécifique pour les tests
        User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}

