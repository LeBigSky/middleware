<x-app-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="max-w-4xl p-6 mx-auto ">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">article n°:
                            {{ $article->id }}</h2>


                        <div class="flex justify-center -mt-16 md:justify-end">
                            <img class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400"
                                alt="Testimonial avatar"
                                src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=76&q=80">
                        </div>
                        <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">
                            {{ $article->titre }}</h2>

                        <p class="mt-2 text-gray-600 dark:text-gray-200">{{ $article->texte }}</p>

                        <div class="flex justify-end mt-4">
                            <a href="#" class="text-xl font-medium text-blue-600 dark:text-blue-300"
                                tabindex="0" role="link">{{ $article->id }}</a>
                        </div>
                </div>
                <div class="flex justify-center">
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3 )
                    <form action="/article/{{ $article->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                            delete
                        </button>
                    </form>
                    <a href="/article/{{ $article->id }}/edit" type="button"
                        class="border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline">
                        Edit
                    </a>
                @endif
                @if (Auth::user()->role_id == 4 && $article->user_id == 4 )
                <form action="/article/{{ $article->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                        delete
                    </button>
                </form>
                <a href="/article/{{ $article->id }}/edit" type="button"
                    class="border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline">
                    Edit
                </a>
            @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
