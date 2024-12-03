@extends('layouts.app')

@section('content')
    <h1>Liste des utilisateurs</h1>
    @foreach ($users as $user)
        <div>
            <a href="/profile/{{ $user->id }}">{{ $user->username }}</a>
        </div>
    @endforeach
@endsection
