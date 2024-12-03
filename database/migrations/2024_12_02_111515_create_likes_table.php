<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id(); // ID unique pour chaque like
            $table->foreignId('user_id') // Clé étrangère vers la table users
                  ->constrained()
                  ->onDelete('cascade'); // Si l'utilisateur est supprimé, les likes le sont aussi
            $table->foreignId('post_id') // Clé étrangère vers la table posts
                  ->constrained()
                  ->onDelete('cascade'); // Si le post est supprimé, les likes le sont aussi
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes'); // Supprime la table si la migration est annulée
    }
};

