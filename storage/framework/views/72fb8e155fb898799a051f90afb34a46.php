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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Welcome to PuckLogic!</h2>
                    <p class="mb-6 text-lg">Select a feature below:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="/leagues" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Leagues</a>
                        <a href="/teams" class="block bg-green-100 hover:bg-green-200 text-green-800 font-semibold px-6 py-4 rounded">Teams</a>
                        <a href="/players" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Players</a>
                        <a href="/stats" class="block bg-purple-100 hover:bg-purple-200 text-purple-800 font-semibold px-6 py-4 rounded">Stats</a>
                        <a href="/analytics/clustering" class="block bg-pink-100 hover:bg-pink-200 text-pink-800 font-semibold px-6 py-4 rounded">Player Clustering</a>
                        <a href="/analytics/radar" class="block bg-indigo-100 hover:bg-indigo-200 text-indigo-800 font-semibold px-6 py-4 rounded">Radar Chart</a>
                        <a href="/brackets/roundrobin" class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold px-6 py-4 rounded">Round Robin Bracket</a>
                        <a href="/brackets/seeding" class="block bg-teal-100 hover:bg-teal-200 text-teal-800 font-semibold px-6 py-4 rounded">Bracket Seeding</a>
                    </div>
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
<?php endif; ?>
<?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/dashboard.blade.php ENDPATH**/ ?>