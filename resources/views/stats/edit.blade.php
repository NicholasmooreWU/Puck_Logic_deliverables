<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Stat') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('stats.update', $stat) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="goals" class="block mb-1 font-medium">Goals</label>
                                <input type="number" name="goals" id="goals" value="{{ $stat->goals }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2">
                            </div>
                            <div>
                                <label for="assists" class="block mb-1 font-medium">Assists</label>
                                <input type="number" name="assists" id="assists" value="{{ $stat->assists }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2">
                            </div>
                            <div>
                                <label for="shots" class="block mb-1 font-medium">Shots</label>
                                <input type="number" name="shots" id="shots" value="{{ $stat->shots }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2">
                            </div>
                            <div>
                                <label for="hits" class="block mb-1 font-medium">Hits</label>
                                <input type="number" name="hits" id="hits" value="{{ $stat->hits }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2">
                            </div>
                            <div>
                                <label for="pim" class="block mb-1 font-medium">PIM</label>
                                <input type="number" name="pim" id="pim" value="{{ $stat->pim }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                            <a href="{{ route('stats.index') }}" class="ml-4 text-blue-600 hover:underline">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>