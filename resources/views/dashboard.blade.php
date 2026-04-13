<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Welcome to PuckLogic!</h2>
                    <p class="mb-6 text-lg">Select a feature below:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="/leagues" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Leagues</a>
                        <a href="/teams" class="block bg-green-100 hover:bg-green-200 text-green-800 font-semibold px-6 py-4 rounded">Teams</a>
                        <a href="/players" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Players</a>
                        <a href="/stats" class="block bg-purple-100 hover:bg-purple-200 text-purple-800 font-semibold px-6 py-4 rounded">Stats</a>
                        <a href="/analytics/clustering" class="block bg-pink-100 hover:bg-pink-200 text-pink-800 font-semibold px-6 py-4 rounded">Player Clustering</a>
                        <a href="/analytics/radar" class="block bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold px-6 py-4 rounded">Radar Chart</a>
                        <a href="/brackets/roundrobin" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Round Robin Bracket</a>
                        <a href="/brackets/seeding" class="block bg-teal-100 hover:bg-teal-200 text-teal-800 font-semibold px-6 py-4 rounded">Bracket Seeding</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
