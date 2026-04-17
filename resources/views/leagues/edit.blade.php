<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit League') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (!auth()->user()->is_play_account)
                        <form method="POST" action="{{ route('leagues.update', $league) }}" class="space-y-6 mb-8">
                            @csrf
                            @method('PATCH')
                            <div>
                                <label for="name" class="block mb-1 font-medium">Name</label>
                                <input type="text" name="name" id="name" value="{{ $league->name }}" required class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-3 py-2 focus:ring focus:ring-blue-200">
                            </div>
                            <div>
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                                <a href="{{ route('leagues.index') }}" class="ml-4 text-blue-600 hover:underline">Back</a>
                            </div>
                        </form>
                    @else
                        <div class="text-red-600 font-semibold mb-6">You do not have permission to edit this league.</div>
                        <a href="{{ route('leagues.index') }}" class="ml-4 text-blue-600 hover:underline">Back</a>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Teams in this League</h3>
                        <ul class="mb-4">
                            @forelse($league->teams as $team)
                                <li class="py-2 border-b last:border-b-0 flex justify-between items-center">
                                    <span>{{ $team->name }}</span>
                                    <form method="POST" action="{{ route('teams.destroy', $team) }}" onsubmit="return confirm('Remove this team from the league?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Remove</button>
                                    </form>
                                </li>
                            @empty
                                <li class="py-2 text-gray-400">No teams yet.</li>
                            @endforelse
                        </ul>
                        @if (!auth()->user()->is_play_account)
                            <form method="POST" action="{{ route('teams.store') }}" class="flex flex-col sm:flex-row gap-2 items-center bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                @csrf
                                <input type="hidden" name="league_id" value="{{ $league->id }}">
                                <input type="text" name="name" placeholder="New Team Name" required class="rounded border-gray-300 dark:bg-gray-800 dark:text-gray-100 px-3 py-2 flex-1">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Team</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>