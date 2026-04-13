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
            <?php echo e(__('League Details')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">ID</dt>
                            <dd><?php echo e($league->id); ?></dd>
                        </div>
                        <div class="py-4 flex justify-between">
                            <dt class="font-medium">Name</dt>
                            <dd><?php echo e($league->name); ?></dd>
                        </div>
                    </dl>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-2">Teams in this League</h3>
                        <ul class="mb-4">
                            <?php $__empty_1 = true; $__currentLoopData = $league->teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="py-2 border-b last:border-b-0 flex justify-between">
                                    <span><?php echo e($team->name); ?></span>
                                    <a href="<?php echo e(route('teams.show', $team)); ?>" class="text-blue-600 hover:underline">View</a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="py-2 text-gray-400">No teams yet.</li>
                            <?php endif; ?>
                        </ul>
                        <form method="POST" action="<?php echo e(route('teams.store')); ?>" class="flex flex-col sm:flex-row gap-2 items-center bg-gray-100 dark:bg-gray-700 p-4 rounded">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="league_id" value="<?php echo e($league->id); ?>">
                            <input type="text" name="name" placeholder="New Team Name" required class="rounded border-gray-300 dark:bg-gray-800 dark:text-gray-100 px-3 py-2 flex-1">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Team</button>
                        </form>
                    </div>

                    <div class="mt-6">
                        <a href="<?php echo e(route('leagues.index')); ?>" class="text-blue-600 hover:underline">Back to Leagues</a>
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
<?php endif; ?><?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/leagues/show.blade.php ENDPATH**/ ?>