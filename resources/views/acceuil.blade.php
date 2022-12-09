<x-app-layout>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
@include('layouts.flash')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acceuil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @if (Auth::user() == null)
                    <h2>Vous n'avez pas de compte ? Connectez-vous ou Inscrivez-vous pour voir nos articles !</h2>    
                @elseif (Auth::user() != null)
                    <div class="p-6 text-gray-900">
                    <h2>Bienvenue sur la page d'acceuil</h2>
                </div>            
                @endif
            </div>
        </div>
    </div>
</x-app-layout>