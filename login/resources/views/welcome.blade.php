<x-guest-layout>
    <nav class="flex justify-between items-center py-4">
        <span class="font-bold">Laravel</span>
        <div class="space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Register</a>
            @endauth
        </div>
    </nav>

    <div class="text-center py-10">
        <h1 class="text-2xl font-bold">Bienvenido</h1>
    </div>
</x-guest-layout>
