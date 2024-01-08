<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Blog Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('blogs.update', ['id' => $blog->id]) }}" class="w-full max-w-lg">
                        @csrf
                        @method('put')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title:</label>
                            <input type="text" name="title" id="title" value="{{ $blog->title }}" class="mt-1 p-2 border rounded-md w-full text-black">
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content:</label>
                            <textarea name="content" id="content" rows="4" class="mt-1 p-2 border rounded-md w-full text-black">{{ $blog->content }}</textarea>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update Blog Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>