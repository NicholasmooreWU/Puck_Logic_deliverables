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
                    <!-- Debug: Print unique archetype_label values -->
                    <?php
                        $uniqueLabels = collect($results)->pluck('archetype_label')->unique()->values();
                    ?>
                    <!-- Debug section removed -->
                    <?php if($results && count($results)): ?>
                        <div class="mb-8">
                            <canvas id="clusterChart" width="400" height="200"></canvas>
                        </div>
                        <!-- Show PNG bar chart if it exists -->
                        <?php
                            $barChartPath = Storage::exists('clustering_archetype_counts.png') ? Storage::url('clustering_archetype_counts.png') : null;
                        ?>
                        <?php if($barChartPath): ?>
                            <div class="mb-8">
                                <img src="<?php echo e($barChartPath); ?>" alt="Archetype Bar Chart" class="rounded shadow max-w-md mx-auto">
                            </div>
                        <?php endif; ?>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
                        <script>
                            // Bar chart for archetype labels ONLY (robust version)
                            const clusterLabelCounts = {};
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                if (typeof clusterLabelCounts["<?php echo e($row['archetype_label'] ?? ''); ?>"] === 'undefined') {
                                    clusterLabelCounts["<?php echo e($row['archetype_label'] ?? ''); ?>"] = 1;
                                } else {
                                    clusterLabelCounts["<?php echo e($row['archetype_label'] ?? ''); ?>"] += 1;
                                }
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            // Use PHP-provided unique label order for consistent display
                            const labelKeys = <?php echo json_encode($uniqueLabels); ?>;
                            const labelData = labelKeys.map(k => clusterLabelCounts[k] || 0);
                            new Chart(document.getElementById('clusterChart'), {
                                type: 'bar',
                                data: {
                                    labels: labelKeys,
                                    datasets: [{
                                        label: 'Players per Archetype',
                                        data: labelData,
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

                            // (Removed broken getPlayerMetrics usage. Use only the radar chart code in the separate section below.)
                        </script>
                        <table class="min-w-full border border-gray-300 mb-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b">Player</th>
                                    <th class="px-4 py-2 border-b">Archetype</th>
                                    <th class="px-4 py-2 border-b">Goals</th>
                                    <th class="px-4 py-2 border-b">Assists</th>
                                    <th class="px-4 py-2 border-b">Shots</th>
                                    <th class="px-4 py-2 border-b">Hits</th>
                                    <th class="px-4 py-2 border-b">PIM</th>
                                    <th class="px-4 py-2 border-b">TOI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['player'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['archetype_label'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['goals'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['assists'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['shots'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['hits'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['pim'] ?? ''); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($row['metrics']['toi'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No clustering results yet.</p>
                    <?php endif; ?>

                    <!-- Radar chart section restored -->
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
                        // Radar chart for selected player (separate section) with normalization
                        const radarPlayerData = <?php echo json_encode($results, 15, 512) ?>;
                        const radarPlayerSelect = document.getElementById('radarPlayerSelect');
                        const radarCanvas = document.getElementById('radarChart');
                        let radarChart;

                        // Gather all metrics for normalization
                        const allMetrics = radarPlayerData.map(p => p.metrics);
                        const metricKeys = allMetrics.length ? Object.keys(allMetrics[0]) : [];
                        // Compute min and max for each metric
                        const metricMins = {};
                        const metricMaxs = {};
                        metricKeys.forEach(k => {
                            metricMins[k] = Math.min(...allMetrics.map(m => m[k]));
                            metricMaxs[k] = Math.max(...allMetrics.map(m => m[k]));
                        });

                        function getRadarPlayerMetrics(playerName) {
                            const found = radarPlayerData.find(p => p.player === playerName);
                            if (!found) return null;
                            // Normalize metrics
                            const metrics = found.metrics;
                            const normalized = {};
                            metricKeys.forEach(k => {
                                const min = metricMins[k];
                                const max = metricMaxs[k];
                                if (max === min) {
                                    normalized[k] = 0.5; // avoid div by zero
                                } else {
                                    normalized[k] = (metrics[k] - min) / (max - min);
                                }
                            });
                            return normalized;
                        }
                        function renderRadarChart(metrics) {
                            if (radarChart) radarChart.destroy();
                            if (!metrics) return;
                            radarChart = new Chart(radarCanvas, {
                                type: 'radar',
                                data: {
                                    labels: metricKeys,
                                    datasets: [{
                                            // No label to avoid legend/label inside chart
                                            label: '',
                                        data: metricKeys.map(k => metrics[k]),
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
                                            suggestedMin: 0,
                                            suggestedMax: 1,
                                            pointLabels: { display: true },
                                            ticks: { display: false } // Hide the 0.1, 0.2, ... labels
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