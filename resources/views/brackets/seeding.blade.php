<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bracket Seeding') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-6 text-indigo-700 dark:text-indigo-300">Teams by Points</h2>
                    <ul class="bg-gray-50 dark:bg-gray-900 shadow rounded-lg p-4 mb-8">
                        @foreach($teams as $team)
                            <li class="py-2 border-b last:border-b-0 flex justify-between">
                                <span class="font-medium">{{ $team->name }}</span>
                                <span class="text-gray-500">Points: {{ $team->points ?? 0 }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <h2 class="text-xl font-semibold mb-6 text-indigo-700 dark:text-indigo-300">Bracket</h2>
                    <ul class="bg-gray-50 dark:bg-gray-900 shadow rounded-lg p-4">
                        @foreach($bracket as $match)
                            <li class="py-2 border-b last:border-b-0 flex justify-between">
                                <span class="font-medium">{{ $match[0] }}</span>
                                <span class="text-gray-500">vs</span>
                                <span class="font-medium">{{ $match[1] }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="/dashboard" class="inline-block mt-8 text-indigo-600 hover:underline font-medium">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>