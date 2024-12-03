<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Inclure le feed -->
            @foreach ($posts as $post)
                <div class="my-4 p-4 bg-gray-100 rounded-lg shadow-md">
                    <h3>{{ $post->user->username }}</h3>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->likes->count() }} likes</p>

                    <!-- Bouton pour liker -->
                    <form method="POST" action="/posts/{{ $post->id }}/like">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Like</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
