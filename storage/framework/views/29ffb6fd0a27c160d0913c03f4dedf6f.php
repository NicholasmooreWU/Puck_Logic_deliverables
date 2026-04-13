<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stat Details</title>
</head>
<body>
    <h1>Stat Details</h1>
    <p>ID: <?php echo e($stat->id); ?></p>
    <p>Player ID: <?php echo e($stat->player_id); ?></p>
    <p>Game ID: <?php echo e($stat->game_id); ?></p>
    <p>Goals: <?php echo e($stat->goals); ?></p>
    <p>Assists: <?php echo e($stat->assists); ?></p>
    <p>Shots: <?php echo e($stat->shots); ?></p>
    <p>Hits: <?php echo e($stat->hits); ?></p>
    <p>PIM: <?php echo e($stat->pim); ?></p>
    <a href="<?php echo e(route('stats.index')); ?>">Back</a>
</body>
</html><?php /**PATH C:\xamp\webdav\puck_logic\laravel_new\resources\views/stats/show.blade.php ENDPATH**/ ?>