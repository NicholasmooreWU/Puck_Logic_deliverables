<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('League Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">ID</dt>
                            <dd>{{ $league->id }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Name</dt>
                            <dd>{{ $league->name }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-2">Teams in this League</h3>
                        <ul class="mb-4">
                            @forelse($league->teams as $team)
                                <li class="py-2 border-b last:border-b-0 flex justify-between">
                                    <span>{{ $team->name }}</span>
                                    <a href="{{ route('teams.show', $team) }}" class="text-blue-600 hover:underline">View</a>
                                </li>
                            @empty
                                <li class="py-2 text-gray-400">No teams yet.</li>
                            @endforelse
                        </ul>
                        <form method="POST" action="{{ route('teams.store') }}" class="flex flex-col sm:flex-row gap-2 items-center bg-gray-100 dark:bg-gray-700 p-4 rounded">
                            @csrf
                            <input type="hidden" name="league_id" value="{{ $league->id }}">
                            <input type="text" name="name" placeholder="New Team Name" required class="rounded border-gray-300 dark:bg-gray-800 dark:text-gray-100 px-3 py-2 flex-1">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Team</button>
                        </form>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('leagues.index') }}" class="text-blue-600 hover:underline">Back to Leagues</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>