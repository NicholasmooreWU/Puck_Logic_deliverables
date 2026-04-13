<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Player Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">ID</dt>
                            <dd>{{ $player->id }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Name</dt>
                            <dd>{{ $player->name }}</dd>
                        </div>
                        @if($player->team)
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Team</dt>
                            <dd>
                                <a href="{{ route('teams.show', $player->team) }}" class="text-blue-600 hover:underline">{{ $player->team->name }}</a>
                            </dd>
                        </div>
                        @endif
                    </dl>
                    <div class="mt-6">
                        <a href="{{ route('players.index') }}" class="text-blue-600 hover:underline">Back to Players</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>