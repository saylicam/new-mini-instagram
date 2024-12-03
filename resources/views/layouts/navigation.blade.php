<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-9 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 focus:text-gray-700">
                        Tableau de bord
                    </a>
                    <a href="{{ url('/feed') }}" class="text-gray-500 hover:text-gray-700 focus:text-gray-700">
                        Fil d'actualité
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div>
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="text-blue-500 ml-4">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 ml-4">Déconnexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

