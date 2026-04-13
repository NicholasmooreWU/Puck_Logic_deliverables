<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Team') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('teams.store') }}" class="space-y-7">
                        @csrf
                        <div>
                            <label for="name" class="block mb-1 font-medium">Name</label>
                            <input type="text" name="name" id="name" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2 focus:ring focus:ring-indigo-200">
                        </div>
                        <div>
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 font-semibold transition">Create</button>
                            <a href="{{ route('teams.index') }}" class="ml-4 text-indigo-600 hover:underline font-medium">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>