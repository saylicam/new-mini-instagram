@extends('layouts.app')

@section('content')
    <h1>Fil d'actualité</h1>
    @foreach ($posts as $post)
        <div class="border p-4 mb-4">
            <h3>{{ $post->user->username }}</h3>
            <p>{{ $post->content }}</p>
            <p>{{ $post->likes->count() }} likes</p>

            <!-- Bouton pour liker -->
            <form method="POST" action="{{ url('/posts/' . $post->id . '/like') }}">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    {{ $post->likes->contains('user_id', auth()->id()) ? 'Unlike' : 'Like' }}
                </button>
            </form>
        </div>
    @endforeach
@endsection
