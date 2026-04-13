<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stat Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">ID</dt>
                            <dd>{{ $stat->id }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Player</dt>
                            <dd>
                                <a href="{{ route('players.show', $stat->player_id) }}" class="text-blue-600 hover:underline">{{ $stat->player->name ?? $stat->player_id }}</a>
                            </dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Game ID</dt>
                            <dd>{{ $stat->game_id }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Goals</dt>
                            <dd>{{ $stat->goals }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Assists</dt>
                            <dd>{{ $stat->assists }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Shots</dt>
                            <dd>{{ $stat->shots }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Hits</dt>
                            <dd>{{ $stat->hits }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">PIM</dt>
                            <dd>{{ $stat->pim }}</dd>
                        </div>
                    </dl>
                    <div class="mt-6">
                        <a href="{{ route('stats.index') }}" class="text-blue-600 hover:underline">Back to Stats</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>