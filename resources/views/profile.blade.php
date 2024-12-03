@extends('layouts.app')

@section('content')
    <h1>Profil de {{ $user->username }}</h1>
    <p>Email : {{ $user->email }}</p>
    <p>Biographie : {{ $user->bio }}</p>
    <p>Nombre de posts : {{ $user->posts->count() }}</p>
    <p>Nombre de followers : {{ $user->followers->count() }}</p>
    <p>Nombre de followings : {{ $user->followings->count() }}</p>

    <h3>Posts :</h3>
    @foreach ($user->posts as $post)
        <div>
            <p>{{ $post->content }}</p>
            <p>{{ $post->likes->count() }} likes</p>
        </div>
    @endforeach
@endsection
