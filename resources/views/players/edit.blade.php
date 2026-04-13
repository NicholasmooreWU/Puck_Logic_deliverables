<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Player') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('players.update', $player) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="name" class="block mb-1 font-medium">Name</label>
                            <input type="text" name="name" id="name" value="{{ $player->name }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2 focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('players.index') }}" class="ml-4 text-blue-600 hover:underline">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>