<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * Attributs mass-assignables.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
    ];

    /**
     * Relation : Le like appartient à un utilisateur (celui qui a aimé).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation : Le like appartient à un post (le post qui a été aimé).
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
