@extends('layouts.app')

@section('content')
    <h1>Post de {{ $post->user->username }}</h1>
    <p>{{ $post->content }}</p>
    <p>{{ $post->likes->count() }} likes</p>

    <h3>Commentaires :</h3>
    @foreach ($post->comments as $comment)
        <p>{{ $comment->content }} - par {{ $comment->user->username }}</p>
    @endforeach
@endsection
