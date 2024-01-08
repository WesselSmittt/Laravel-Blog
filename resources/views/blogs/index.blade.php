<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog pagina') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Blog Index</h1>

                    @foreach($blogs as $blog)
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold">{{ $blog->title }}</h2>
                            <p>{{ $blog->content }}</p>
                            <p class="text-gray-500">Author: {{ $blog->user->name }}</p>
                            <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}" class="text-blue-500">Edit</a>
                            <!-- Delete button -->
                            <form method="post" action="{{ route('blogs.destroy', ['id' => $blog->id]) }}" style="display:inline-block;">
                             @csrf
                             @method('delete')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
                            </form>

                            <hr class="my-2">
                        </div>
                        
                    @endforeach

                    <a href="{{ url('/blogs/create') }}" class="text-blue-500">Create a New Blog Post</a>

                
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
