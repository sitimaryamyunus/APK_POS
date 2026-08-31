

<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container produk-form-wrap py-4">
    <div class="produk-form-section">
        <div class="produk-form-header">
            <h1>Tambah Produk</h1>
            <a href="<?php echo e(route('produk.index')); ?>" class="btn-kembali">&larr; Kembali</a>
        </div>

        <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo $__env->make('produk._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POSS\resources\views/produk/create.blade.php ENDPATH**/ ?>