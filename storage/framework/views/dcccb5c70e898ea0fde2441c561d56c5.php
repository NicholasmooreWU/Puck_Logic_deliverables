<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Player Clustering')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php if(session('status')): ?>
                        <p class="mb-4 text-green-600"><?php echo e(session('status')); ?></p>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('analytics.clustering.trigger')); ?>" class="mb-6">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Recalculate Clusters</button>
                    </form>
                    <h3 class="text-lg font-semibold mb-2">Results</h3>
                    <?php if($results && count($results)): ?>
                        <div class="mb-8">
                            <canvas id="clusterChart" width="400" height="200"></canvas>
                        </div>
                        <!-- No radar chart in clustering section -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                        <script>
                            // Bar chart for clusters
                            const clusterCounts = {};
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                clusterCounts[<?php echo e($row['archetype']); ?>] = (clusterCounts[<?php echo e($row['archetype']); ?>] || 0) + 1;
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            const labels = Object.keys(clusterCounts).sort((a, b) => a - b);
                            const data = labels.map(k => clusterCounts[k]);
                            new Chart(document.getElementById('clusterChart'), {
                                type: 'bar',
                                data: {
                                    labels: labels.map(l => 'Cluster ' + l),
                                    datasets: [{
                                        label: 'Players per Cluster',
                                        data: data,
                                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                        borderColor: 'rgb(54, 162, 235)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: { legend: { display: false } },
                                    scales: { y: { beginAtZero: true, precision: 0 } }
                                }
                            });

                            // Radar chart for selected player
                            const playerData = <?php echo json_encode($results, 15, 512) ?>;
                            const playerSelect = document.getElementById('playerSelect');
                            const radarCanvas = document.getElementById('radarChart');
                            let radarChart;

                            function getPlayerMetrics(playerName) {
                                const found = playerData.find(p => p.player === playerName);
                                return found ? found.metrics : null;
                            }

                            function renderRadarChart(metrics) {
                                if (radarChart) radarChart.destroy();
                                if (!metrics) return;
                                radarChart = new Chart(radarCanvas, {
                                    type: 'radar',
                                    data: {
                                        labels: Object.keys(metrics),
                                        datasets: [{
                                            label: 'Player Metrics',
                                            data: Object.values(metrics),
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            borderWidth: 2,
                                            pointBackgroundColor: 'rgb(255, 99, 132)'
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: { legend: { display: true } },
                                        scales: {
                                            r: {
                                                beginAtZero: true,
                                                angleLines: { display: true },
                                                suggestedMin: 0
                                            }
                                        }
                                    }
                                });
                            }

                            // Initial render
                            renderRadarChart(getPlayerMetrics(playerSelect.value));
                            playerSelect.addEventListener('change', function() {
                                renderRadarChart(getPlayerMetrics(this.value));
                            });
                        </script>
                        <table class="min-w-full border border-gray-300 mb-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">Player</th>
                                    <th class="px-4 py-2 border-b">Archetype</th>
                                    <th class="px-4 py-2 border-b">Metrics</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['player'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['archetype'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e(json_encode($row['metrics'] ?? [])); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No clustering results yet.</p>
                    <?php endif; ?>
                    <!-- Separate Radar Chart Section -->
                    <div class="mt-12 mb-8 max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
                        <h3 class="text-lg font-semibold mb-4">Player Metrics Radar Chart</h3>
                        <label for="radarPlayerSelect" class="block mb-2 font-semibold">Select Player:</label>
                        <select id="radarPlayerSelect" class="mb-4 px-2 py-1 rounded bg-gray-200 text-gray-900 w-full">
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row['player']); ?>"><?php echo e($row['player']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <canvas id="radarChart" width="220" height="160" style="max-width:100%;"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                    <script>
                        // Radar chart for selected player (separate section)
                        const radarPlayerData = <?php echo json_encode($results, 15, 512) ?>;
                        const radarPlayerSelect = document.getElementById('radarPlayerSelect');
                        const radarCanvas = document.getElementById('radarChart');
                        let radarChart;
                        function getRadarPlayerMetrics(playerName) {
                            const found = radarPlayerData.find(p => p.player === playerName);
                            return found ? found.metrics : null;
                        }
                        function renderRadarChart(metrics) {
                            if (radarChart) radarChart.destroy();
                            if (!metrics) return;
                            radarChart = new Chart(radarCanvas, {
                                type: 'radar',
                                data: {
                                    labels: Object.keys(metrics),
                                    datasets: [{
                                        label: 'Player Metrics',
                                        data: Object.values(metrics),
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        borderWidth: 2,
                                        pointBackgroundColor: 'rgb(255, 99, 132)'
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: { legend: { display: true } },
                                    scales: {
                                        r: {
                                            beginAtZero: true,
                                            angleLines: { display: true },
                                            suggestedMin: 0
                                        }
                                    }
                                }
                            });
                        }
                        // Initial render
                        renderRadarChart(getRadarPlayerMetrics(radarPlayerSelect.value));
                        radarPlayerSelect.addEventListener('change', function() {
                            renderRadarChart(getRadarPlayerMetrics(this.value));
                        });
                    </script>
                    <a href="/dashboard" class="inline-block mt-6 text-blue-600 hover:underline">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/analytics/clustering.blade.php ENDPATH**/ ?>