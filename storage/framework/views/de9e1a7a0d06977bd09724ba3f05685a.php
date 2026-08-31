

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .pos-wrap {
        max-width: 1300px;
    }

    .pos-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .pos-title::before {
        content: "";
        width: 6px;
        height: 1.05rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    .alert-custom {
        background: rgba(254, 226, 226, 0.7);
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 1rem;
        padding: 0.9rem 1.25rem;
        font-weight: 600;
        margin-bottom: 1.25rem;
    }

    /* Panel wrapper */
    .pos-panel {
        background: rgba(255, 255, 255, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.5rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 10px 25px rgba(219, 39, 119, 0.05);
        overflow: hidden;
        height: 100%;
    }

    .pos-panel-body {
        padding: 1.25rem;
        max-height: 70vh;
        overflow: auto;
    }

    .pos-panel-body::-webkit-scrollbar {
        width: 6px;
    }

    .pos-panel-body::-webkit-scrollbar-thumb {
        background: #fbcfe8;
        border-radius: 10px;
    }

    /* Search box produk */
    .search-box-custom {
        border-radius: 1rem;
        border: 1px solid #fbcfe8;
        padding: 0.6rem 1.1rem;
        background: rgba(255, 255, 255, 0.9);
        color: #4c0519;
        font-weight: 500;
        transition: all 0.25s ease;
        margin-bottom: 1rem;
    }

    .search-box-custom:focus {
        outline: none;
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        background: #fff;
    }

    .search-box-custom::placeholder {
        color: #f472b6;
        opacity: 0.7;
    }

    /* Kartu produk di list */
    .produk-row {
        margin-bottom: 0.6rem;
    }

    .btn-produk-item {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid #fbcfe8;
        border-radius: 0.9rem;
        padding: 0.6rem 0.9rem;
        width: 100%;
        text-align: left;
        color: #4c0519;
        transition: all 0.2s;
    }

    .btn-produk-item:hover {
        background: #fff;
        border-color: #ec4899;
        box-shadow: 0 4px 12px rgba(236, 72, 153, 0.12);
    }

    .btn-produk-item.disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    .produk-nama {
        font-weight: 700;
        color: #4c0519;
        font-size: 0.9rem;
    }

    .produk-harga {
        color: #db2777;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .qty-input-custom {
        border-radius: 0.9rem;
        border: 1px solid #fbcfe8;
        padding: 0.5rem;
        text-align: center;
        background: rgba(255, 255, 255, 0.9);
        color: #4c0519;
        font-weight: 600;
    }

    .qty-input-custom:focus {
        outline: none;
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
    }

    .btn-tambah-item {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border: none;
        border-radius: 0.9rem;
        color: #fff;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-tambah-item:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(236, 72, 153, 0.3);
        color: #fff;
    }

    .btn-tambah-item.disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    /* Tabel keranjang */
    .table-keranjang {
        margin-bottom: 0;
    }

    .table-keranjang thead tr {
        background: rgba(251, 207, 232, 0.55);
    }

    .table-keranjang thead th {
        border: none;
        font-weight: 700;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #9d174d;
        padding: 0.85rem 0.75rem;
    }

    .table-keranjang tbody tr {
        border-bottom: 1px solid rgba(251, 207, 232, 0.25);
        background-color: #fff;
    }

    .table-keranjang tbody tr:last-child {
        border-bottom: none;
    }

    .table-keranjang tbody td {
        padding: 0.75rem;
        color: #4c0519;
        font-weight: 500;
        font-size: 0.88rem;
        vertical-align: middle;
        border: none;
    }

    .qty-cart-input {
        width: 70px;
        border-radius: 0.6rem;
        border: 1px solid #fbcfe8;
        padding: 0.35rem;
        text-align: center;
        background: #fff;
        color: #4c0519;
        font-weight: 600;
    }

    .qty-cart-input:focus {
        outline: none;
        border-color: #ec4899;
        box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.15);
    }

    .btn-hapus-item {
        background-color: rgba(254, 228, 226, 0.7);
        border: 1px solid #fecdd3;
        color: #e11d48;
        font-weight: 600;
        font-size: 0.78rem;
        border-radius: 0.6rem;
        padding: 0.3rem 0.75rem;
        transition: all 0.2s;
    }

    .btn-hapus-item:hover {
        background-color: #e11d48;
        border-color: #e11d48;
        color: #fff;
    }

    /* Footer keranjang */
    .cart-footer {
        padding: 1.25rem;
        background: rgba(253, 242, 248, 0.5);
        border-top: 1px solid rgba(251, 207, 232, 0.4);
    }

    .cart-total {
        font-size: 1.15rem;
        font-weight: 800;
        color: #9d174d;
        margin-bottom: 0.9rem;
        display: block;
    }

    .select-pembayaran {
        border-radius: 0.9rem;
        border: 1px solid #fbcfe8;
        padding: 0.6rem 1rem;
        background: rgba(255, 255, 255, 0.9);
        color: #4c0519;
        font-weight: 500;
        margin-bottom: 0.75rem;
    }

    .select-pembayaran:focus {
        outline: none;
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
    }

    .btn-checkout {
        background: linear-gradient(135deg, #34d399 0%, #059669 100%);
        border: none;
        border-radius: 1rem;
        padding: 0.7rem;
        font-weight: 700;
        color: #fff;
        width: 100%;
        box-shadow: 0 6px 15px rgba(5, 150, 105, 0.25);
        transition: all 0.25s ease;
        margin-bottom: 0.6rem;
    }

    .btn-checkout:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(5, 150, 105, 0.35);
        color: #fff;
    }

    .btn-checkout:disabled {
        opacity: 0.5;
    }

    .btn-batal {
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid #fecdd3;
        border-radius: 1rem;
        padding: 0.65rem;
        font-weight: 700;
        color: #e11d48;
        width: 100%;
        transition: all 0.2s;
    }

    .btn-batal:hover:not(:disabled) {
        background: #e11d48;
        color: #fff;
    }

    .btn-batal:disabled {
        opacity: 0.5;
    }

    .empty-cart {
        color: #f472b6;
        font-style: italic;
        font-weight: 500;
    }
</style>

<div class="container pos-wrap py-4">

    <?php if(session('errors')): ?>
        <div class="alert-custom">
            <?php echo e(session('errors')); ?>

        </div>
    <?php endif; ?>

    <div class="pos-title">
        <?php echo e($mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

    </div>

    <div class="row g-3">

        
        <div class="col-md-6">
            <div class="pos-panel">
                <div class="pos-panel-body">

                    <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                        <input type="text"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            class="form-control search-box-custom"
                            placeholder="Cari produk..."
                            onkeyup="this.form.submit()">
                    </form>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="POST" action="<?php echo e(route('itempenjualan.store')); ?>" class="row produk-row g-2">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                            <div class="col-7">
                                <button class="btn-produk-item <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">
                                    <div class="produk-nama"><?php echo e($product->nama); ?></div>
                                    <div class="produk-harga">Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?></div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="form-control qty-input-custom"
                                    <?php echo e($sale->status === 'COMPLETED' ? 'readonly' : ''); ?>>
                            </div>

                            <div class="col-2">
                                <button class="btn-tambah-item w-100 h-100 <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">+</button>
                            </div>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="pos-panel">
                <table class="table table-keranjang text-center">
                    <thead>
                        <tr>
                            <th class="text-start">Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-start" style="font-weight: 600;"><?php echo e($item->produk->nama); ?></td>
                                <td>Rp <?php echo e(number_format($item->produk->harga_jual)); ?></td>
                                <td>
                                    <form method="POST" action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                                        <input type="number" name="quantity"
                                            value="<?php echo e($item->kuantitas); ?>"
                                            min="1"
                                            class="qty-cart-input"
                                            onchange="this.form.submit()"
                                            <?php echo e($sale->status === 'COMPLETED' ? 'readonly' : ''); ?>>
                                    </form>
                                </td>
                                <td style="font-weight: 700; color: #9d174d;">Rp <?php echo e(number_format($item->subtotal)); ?></td>
                                <td>
                                    <?php if(auth()->user()->role_id === 1): ?>
                                        <form method="POST" action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-hapus-item">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 empty-cart">
                                    Keranjang masih kosong
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="cart-footer">
                    <span class="cart-total">Total: Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?></span>

                    <form method="POST"
                        action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                        onsubmit="return confirm('Yakin ingin checkout?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <select name="payment_method" class="form-select select-pembayaran" <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>
                            <option value="">Pilih Pembayaran</option>
                            <option value="CASH">Cash</option>
                            <option value="QRIS">QRIS</option>
                        </select>

                        <button class="btn-checkout" <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>
                            Checkout
                        </button>
                    </form>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                        <form action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>" method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn-batal" <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>
                                Batal Transaksi
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POSS\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>