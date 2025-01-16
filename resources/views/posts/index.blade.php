<x-app-layout>
    <x-slot:title>
        {{ __('Posts') }}
    </x-slot:title>

    <x-slot:header>
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                {{ __('New Post') }}
            </a>
        </div>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="space-y-6">
                @forelse ($posts as $post)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="flex items-center">
                                        <div class="text-lg font-semibold">{{ $post->user->name }}</div>
                                        <div class="ml-2 text-sm text-gray-500">
                                            {{ $post->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                    <div class="mt-4">{{ $post->content }}</div>
                                </div>

                                @if ($post->user->is(Auth::user()))
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="text-blue-500 hover:text-blue-700">
                                            {{ __('Edit') }}
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                            onsubmit="return confirm('{{ __('Are you sure you want to delete this post?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 text-center text-gray-500">
                            {{ __('No posts yet. Why not create one?') }}
                        </div>
                    </div>
                @endforelse

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
