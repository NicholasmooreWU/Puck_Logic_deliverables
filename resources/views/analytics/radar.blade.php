<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Player Radar Chart') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="" class="mb-6 flex flex-col sm:flex-row items-center gap-2">
                        <label for="player-input" class="mr-2">Player Name:</label>
                        <input id="player-input" type="text" name="player" value="{{ request('player') }}" class="rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 px-2 py-1" aria-label="Player Name">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Show</button>
                    </form>
                    @if(isset($metrics))
                        <div class="mb-6">
                            <canvas id="radarChart" width="400" height="400"></canvas>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                        <script>
                            // Original metrics and labels from backend
                            const labels = {!! json_encode($labels) !!};
                            const rawMetrics = {!! json_encode($metrics) !!};

                            // All player metrics for normalization (passed from backend)
                            const allPlayerMetrics = {!! json_encode($allPlayerMetrics ?? []) !!};

                            // Normalize function (min-max for each stat)
                            function normalizeMetric(value, statIndex) {
                                if (!allPlayerMetrics.length) return value;
                                const statValues = allPlayerMetrics.map(m => m[statIndex]);
                                const min = Math.min(...statValues);
                                const max = Math.max(...statValues);
                                if (max === min) return 0.5; // avoid div by zero
                                return (value - min) / (max - min);
                            }

                            // Normalize current player's metrics
                            const normalizedMetrics = rawMetrics.map((v, i) => normalizeMetric(v, i));

                            const data = {
                                labels: labels,
                                datasets: [{
                                    label: 'Player Metrics (Normalized)',
                                    data: normalizedMetrics,
                                    fill: true,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgb(54, 162, 235)',
                                    pointBackgroundColor: 'rgb(54, 162, 235)',
                                }]
                            };
                            new Chart(document.getElementById('radarChart'), {
                                type: 'radar',
                                data: data,
                            });
                        </script>
                    @elseif(request('player'))
                        <p>No metrics found for this player.</p>
                    @endif
                    <a href="/dashboard" class="inline-block mt-6 text-blue-600 hover:underline">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>