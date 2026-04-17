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
        <div class="flex items-center gap-3">
            <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'h-8 w-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
            <h2 class="font-semibold text-xl text-indigo-800 leading-tight">
                <?php echo e(__('Dashboard')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-lg sm:rounded-2xl border border-gray-800">
                <div class="p-10">
                    <h2 class="text-3xl font-extrabold mb-4 text-white">Welcome to PuckLogic!</h2>
                    <p class="mb-8 text-lg text-gray-200">Select a feature to get started:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <a href="/leagues" class="group block bg-black hover:bg-indigo-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 7v4a1 1 0 001 1h3v6a1 1 0 001 1h4a1 1 0 001-1v-6h3a1 1 0 001-1V7"/></svg>
                            Leagues
                        </a>
                        <a href="/teams" class="group block bg-black hover:bg-green-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a4 4 0 00-3-3.87"/><path d="M9 20H4v-2a4 4 0 013-3.87"/><circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 014-4h0a4 4 0 014 4v2"/></svg>
                            Teams
                        </a>
                        <a href="/players" class="group block bg-black hover:bg-purple-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4"/><path d="M6 21v-2a4 4 0 014-4h0a4 4 0 014 4v2"/></svg>
                            Players
                        </a>
                        <a href="/stats" class="group block bg-black hover:bg-blue-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3v18h18"/><rect x="7" y="13" width="3" height="5"/><rect x="14" y="8" width="3" height="10"/></svg>
                            Stats
                        </a>
                        <a href="/analytics/clustering" class="group block bg-black hover:bg-pink-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/></svg>
                            Player Clustering
                        </a>
                        <a href="/brackets/roundrobin" class="group block bg-black hover:bg-cyan-700 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
                            Round Robin Bracket
                        </a>
                        <a href="/brackets/seeding" class="group block bg-black hover:bg-pink-900 border border-gray-800 text-white font-semibold px-6 py-8 rounded-2xl shadow transition-colors duration-200 flex flex-col items-center">
                            <svg class="h-8 w-8 mb-3 text-white group-hover:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                            Bracket Seeding
                        </a>
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