<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stats') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('stats.create') }}" class="inline-block mb-6 px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">Add Stat</a>
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-sm">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-800">
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">ID</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Player</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Game</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Goals</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Assists</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Shots</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Hits</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">PIM</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($stats as $stat)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-4 py-2 border-b">{{ $stat->id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->player_id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->game_id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->goals }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->assists }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->shots }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->hits }}</td>
                                    <td class="px-4 py-2 border-b">{{ $stat->pim }}</td>
                                    <td class="px-4 py-2 border-b space-x-2">
                                        <a href="{{ route('stats.show', $stat) }}" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 font-medium transition">View</a>
                                        <a href="{{ route('stats.edit', $stat) }}" class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200 font-medium transition">Edit</a>
                                        <form action="{{ route('stats.destroy', $stat) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 font-medium transition">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="/dashboard" class="inline-block mt-8 text-indigo-600 hover:underline font-medium">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>