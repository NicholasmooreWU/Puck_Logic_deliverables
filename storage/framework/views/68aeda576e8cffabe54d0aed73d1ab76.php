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
            <?php echo e(__('Stats')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <?php if(!auth()->user()->is_play_account): ?>
                        <a href="<?php echo e(route('stats.create')); ?>" class="inline-block mb-6 px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">Add Stat</a>
                    <?php endif; ?>
                    <div class="overflow-x-auto rounded-lg">
                        <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-sm">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-800">
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">ID</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Player</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Game</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Goals</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Assists</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Shots</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Hits</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">PIM</th>
                                    <th class="px-4 py-3 border-b font-semibold text-left text-gray-700 dark:text-gray-300">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->id); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->player_id); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->game_id); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->goals); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->assists); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->shots); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->hits); ?></td>
                                    <td class="px-4 py-2 border-b"><?php echo e($stat->pim); ?></td>
                                    <td class="px-4 py-2 border-b space-x-2">
                                        <a href="<?php echo e(route('stats.show', $stat)); ?>" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 font-medium transition">View</a>
                                        <?php if(!auth()->user()->is_play_account): ?>
                                            <a href="<?php echo e(route('stats.edit', $stat)); ?>" class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200 font-medium transition">Edit</a>
                                            <form action="<?php echo e(route('stats.destroy', $stat)); ?>" method="POST" class="inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 font-medium transition">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="/dashboard" class="inline-block mt-8 text-indigo-600 hover:underline font-medium">Back to Dashboard</a>
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
<?php endif; ?><?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/stats/index.blade.php ENDPATH**/ ?>