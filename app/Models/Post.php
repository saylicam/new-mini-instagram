<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * Relation : Un post appartient à un utilisateur (auteur du post).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation : Un post peut avoir plusieurs commentaires.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relation : Un post peut avoir plusieurs likes.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
