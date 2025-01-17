<x-app-layout>
    <x-slot:title>
        {{ __('Create Post') }}
    </x-slot:title>

    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('What\'s on your mind?') }}
                            </label>

                            <textarea name="content" id="content" rows="4"
                                class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md @error('content') border-red-500 @enderror"
                                required>{{ old('content') }}</textarea>

                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('posts.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                {{ __('Post') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
