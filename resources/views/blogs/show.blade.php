<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $blog->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">{{ $blog->title }}</h1>
                    <p>{{ $blog->content }}</p>
                    <p class="text-gray-500">Author: {{ $blog->user->name }}</p>                    
                    <a href="{{ url('/blogs') }}" class="text-blue-500">Back to Blog Index</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
