<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Utilisateur suivi
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade'); // Utilisateur qui suit
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
