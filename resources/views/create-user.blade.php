@extends('layouts.app')

@section('content')
    <h1>Créer un utilisateur</h1>
    <form method="POST" action="/create-user">
        @csrf
        <input type="text" name="name" placeholder="Nom">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <textarea name="bio" placeholder="Biographie"></textarea>
        <input type="url" name="profile_picture" placeholder="URL de la photo de profil">
        <button type="submit">Créer</button>
    </form>
@endsection

