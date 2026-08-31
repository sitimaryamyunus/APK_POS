

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .dashboard-wrap {
        max-width: 1200px;
    }

    /* Section wrapper supaya tiap blok punya "rumah" sendiri */
    .dashboard-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem 1.75rem 1.5rem 1.75rem;
        margin-bottom: 2rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .dashboard-section h1 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #9d174d;
        margin-bottom: 1.25rem;
        letter-spacing: -0.3px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .dashboard-section h1::before {
        content: "";
        width: 6px;
        height: 1.1rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    /* Kartu ringkasan */
    .card {
        border: none;
        border-radius: 1.25rem;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.7);
        box-shadow:
            0 8px 20px -6px rgba(219, 39, 119, 0.08),
            0 0 0 1px rgba(251, 207, 232, 0.4);
        transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.2s ease;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow:
            0 14px 28px -6px rgba(219, 39, 119, 0.14),
            0 0 0 1px rgba(251, 207, 232, 0.6);
    }

    .card .card-header {
        background: transparent;
        color: #be185d;
        border: none;
        font-weight: 700;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 1.1rem 1.25rem 0.15rem 1.25rem;
    }

    .card .card-body {
        background: transparent;
        padding: 0.15rem 1.25rem 1.25rem 1.25rem;
    }

    .card .card-title {
        color: #4c0519;
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 0;
        line-height: 1.3;
    }

    /* Sub-judul tabel */
    h3 {
        font-size: 0.95rem;
        font-weight: 700;
        color: #be185d;
        margin-bottom: 0.85rem;
        padding-left: 0.1rem;
    }

    /* Tabel */
    .table-card {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 6px 18px rgba(219, 39, 119, 0.04);
    }

    .table {
        margin-bottom: 0;
        background: transparent;
    }

    .table thead tr {
        background: rgba(251, 207, 232, 0.55) !important;
    }

    .table thead th {
        border: none;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #9d174d !important;
        padding: 0.8rem;
    }

    .table tbody tr {
        border-bottom: 1px solid rgba(251, 207, 232, 0.25);
        background: transparent;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.5) !important;
    }

    .table tbody td {
        padding: 0.75rem;
        color: #4c0519;
        font-weight: 500;
        font-size: 0.9rem;
        vertical-align: middle;
        border: none;
    }

    .table .text-muted {
        color: #f472b6 !important;
        font-style: italic;
        font-weight: 500;
    }

    /* Pagination */
    .pagination .page-link {
        color: #db2777;
        background-color: rgba(255, 255, 255, 0.5);
        border: 1px solid #fbcfe8;
        border-radius: 0.5rem;
        margin: 0 2px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border-color: #ec4899;
        color: #fff;
    }

    .pagination .page-link:hover {
        background-color: #fdf2f8;
        color: #be185d;
        border-color: #fbcfe8;
    }

    .pagination-wrapper p {
        display: none;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
    }

    @media (max-width: 767px) {
        .dashboard-section {
            padding: 1.25rem;
        }
    }
</style>

<div class="container dashboard-wrap mt-4">

    <!-- Row 1: Today's Sales -->
    <div class="dashboard-section">
        <h1>Penjualan Hari Ini</h1>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Nilai Penjualan Hari Ini</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Jumlah Transaksi Hari Ini</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($ringkasan['total_transaksi']); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Cash & Payment Status -->
    <div class="dashboard-section">
        <h1>Status Kas & Pembayaran</h1>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Pembayaran Tunai</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($ringkasan['total_cash'])); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Total Pembayaran Non-Tunai</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3: Critical Inventory Status -->
    <div class="dashboard-section">
        <h1>Status Stok Kritis</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <h3>Daftar Produk Stok Rendah</h3>
                <div class="table-card">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                                    <td><?php echo e($produk->nama); ?></td>
                                    <td><?php echo e($produk->stok); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-wrapper">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>
            </div>
            <div class="col-md-6">
                <h3>Produk Habis Stok</h3>
                <div class="table-card">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                                    <td><?php echo e($produk->nama); ?></td>
                                    <td><?php echo e($produk->stok); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3" class="text-muted text-center py-4">
                                        Seluruh produk berada dalam kondisi stok aman.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination-wrapper">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Row 4: Best Selling Products -->
    <div class="dashboard-section mb-5">
        <h1>Produk Terlaris</h1>
        <div class="table-card">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Unit Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($produk->nama); ?></td>
                            <td><?php echo e($produk->stok); ?></td>
                            <td><?php echo e($produk->total_terjual); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-muted text-center py-4">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POSS\resources\views/dashboard.blade.php ENDPATH**/ ?>