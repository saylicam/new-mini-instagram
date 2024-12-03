<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

// Route d'accueil : redirige vers le feed
Route::get('/', function () {
    return redirect('/feed');
});

// Tableau de bord (Dashboard)
Route::get('/dashboard', function () {
    return redirect('/feed'); // Redirige vers le feed
})->middleware(['auth'])->name('dashboard');

// Route pour afficher tous les utilisateurs
Route::get('/users', function () {
    $users = User::all();
    return view('users', compact('users'));
})->middleware(['auth']);

// Route pour afficher le formulaire de création d'utilisateur
Route::get('/create-user', function () {
    return view('create-user');
})->middleware(['auth']);

// Route pour traiter le formulaire de création
Route::post('/create-user', function (Request $request) {
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'username' => 'required|max:255|unique:users',
        'bio' => 'nullable',
        'profile_picture' => 'nullable|url',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'username' => $request->username,
        'bio' => $request->bio,
        'profile_picture' => $request->profile_picture,
    ]);

    return redirect('/users');
})->middleware(['auth']);

// Route pour afficher le profil d'un utilisateur
Route::get('/profile/{id}', function ($id) {
    $user = User::with('posts', 'followers', 'following')->findOrFail($id);
    return view('profile', compact('user'));
})->middleware(['auth']);

// Route pour afficher le fil d'actualité
Route::get('/feed', function () {
    $posts = Post::with('user', 'likes')->latest()->get();
    return view('feed', compact('posts'));
})->middleware(['auth']);

// Route pour créer un nouveau post
Route::post('/create-post', function (Request $request) {
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'content' => 'required',
    ]);

    Post::create([
        'user_id' => $request->user_id,
        'content' => $request->content,
    ]);

    return redirect('/feed');
})->middleware(['auth']);

// Route pour liker un post
Route::post('/posts/{post}/like', function ($postId, Request $request) {
    $post = Post::findOrFail($postId);

    $userId = auth()->id(); // Utilise l'utilisateur actuellement connecté

    $existingLike = Like::where('user_id', $userId)
                        ->where('post_id', $post->id)
                        ->first();

    if ($existingLike) {
        $existingLike->delete(); // Supprime le like existant (toggle)
    } else {
        $post->likes()->create([
            'user_id' => $userId,
        ]);
    }

    return back();
})->middleware(['auth']);

// Route pour afficher un post spécifique
Route::get('/posts/{id}', function ($id) {
    $post = Post::with('user', 'comments', 'likes')->findOrFail($id);
    return view('post', compact('post'));
})->middleware(['auth']);

// Authentification Laravel Breeze
require __DIR__ . '/auth.php';


