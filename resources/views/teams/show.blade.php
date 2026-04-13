<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Team Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">ID</dt>
                            <dd>{{ $team->id }}</dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Name</dt>
                            <dd>{{ $team->name }}</dd>
                        </div>
                        @if($team->league)
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">League</dt>
                            <dd>
                                <a href="{{ route('leagues.show', $team->league) }}" class="text-indigo-600 hover:underline font-medium">{{ $team->league->name }}</a>
                            </dd>
                        </div>
                        @endif
                    </dl>
                    <div class="mt-8">
                        <a href="{{ route('teams.index') }}" class="text-indigo-600 hover:underline font-medium">Back to Teams</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>