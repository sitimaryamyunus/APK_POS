<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <div class="container-fluid p-0">
        
        <?php echo $__env->yieldContent('content'); ?>
        
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\APK_POSS\resources\views/layouts/app.blade.php ENDPATH**/ ?>