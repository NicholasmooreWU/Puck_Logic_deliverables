<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Round Robin Bracket') }}
		</h2>
	</x-slot>
	<div class="py-12">
		<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
				<div class="p-8 text-gray-900 dark:text-gray-100">
					@if(count($teams) < 2)
						<div class="p-4 rounded bg-yellow-100 text-yellow-800">Not enough teams to generate a schedule.</div>
					@else
						@foreach($schedule as $roundIndex => $round)
							<div class="mb-6">
								<h3 class="text-lg font-semibold mb-3 text-indigo-700 dark:text-indigo-300">Round {{ $roundIndex + 1 }}</h3>
								<ul class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow p-4">
									@foreach($round as $match)
										<li class="py-2 border-b last:border-b-0 flex justify-between">
											<span class="font-medium">{{ $match[0] }}</span>
											<span class="text-gray-500">vs</span>
											<span class="font-medium">{{ $match[1] }}</span>
										</li>
									@endforeach
								</ul>
							</div>
						@endforeach
					@endif
					<a href="/dashboard" class="inline-block mt-8 text-indigo-600 hover:underline font-medium">Back to Dashboard</a>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>