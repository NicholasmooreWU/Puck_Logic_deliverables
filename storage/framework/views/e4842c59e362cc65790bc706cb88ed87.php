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
			<?php echo e(__('Round Robin Bracket')); ?>

		</h2>
	 <?php $__env->endSlot(); ?>
	<div class="py-12">
		<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl border border-gray-200 dark:border-gray-700">
				<div class="p-8 text-gray-900 dark:text-gray-100">
					<?php if(count($teams) < 2): ?>
						<div class="p-4 rounded bg-yellow-100 text-yellow-800">Not enough teams to generate a schedule.</div>
					<?php else: ?>
						<?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roundIndex => $round): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="mb-6">
								<h3 class="text-lg font-semibold mb-3 text-indigo-700 dark:text-indigo-300">Round <?php echo e($roundIndex + 1); ?></h3>
								<ul class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow p-4">
									<?php $__currentLoopData = $round; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li class="py-2 border-b last:border-b-0 flex justify-between">
											<span class="font-medium"><?php echo e($match[0]); ?></span>
											<span class="text-gray-500">vs</span>
											<span class="font-medium"><?php echo e($match[1]); ?></span>
										</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/brackets/roundrobin.blade.php ENDPATH**/ ?>