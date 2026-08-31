<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .produk-form-wrap {
        max-width: 900px;
    }

    .produk-form-section {
        background: rgba(255, 255, 255, 0.55);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 2rem;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(219, 39, 119, 0.06);
    }

    .produk-form-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.75rem;
    }

    .produk-form-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .produk-form-header h1::before {
        content: "";
        width: 6px;
        height: 1.05rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    .btn-kembali {
        color: #be185d;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        padding: 0.45rem 0.9rem;
        border-radius: 0.6rem;
        border: 1px solid #fbcfe8;
        background: rgba(255, 255, 255, 0.6);
        transition: all 0.2s;
    }

    .btn-kembali:hover {
        background: #fdf2f8;
        color: #9d174d;
    }

    .form-row {
        margin-bottom: 1.25rem;
    }

    .form-row label {
        display: block;
        font-weight: 700;
        font-size: 0.85rem;
        color: #be185d;
        margin-bottom: 0.4rem;
    }

    .form-control-custom {
        width: 100%;
        border-radius: 0.9rem;
        border: 1px solid #fbcfe8;
        padding: 0.65rem 1rem;
        background: rgba(255, 255, 255, 0.85);
        color: #4c0519;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .form-control-custom:focus {
        outline: none;
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        background: #fff;
    }

    input[type="file"].form-control-custom {
        padding: 0.5rem 0.75rem;
    }

    .form-control-custom.is-invalid {
        border-color: #e11d48;
        box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
    }

    .invalid-feedback-custom {
        color: #e11d48;
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 0.35rem;
    }

    .foto-box-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }

    .foto-box {
        width: 130px;
        height: 130px;
        border-radius: 1rem;
        border: 2px dashed #fbcfe8;
        background: rgba(255, 255, 255, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .foto-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .foto-box span {
        color: #f472b6;
        font-size: 0.75rem;
        font-style: italic;
        text-align: center;
        padding: 0 0.5rem;
    }

    .foto-box-label {
        font-weight: 700;
        font-size: 0.85rem;
        color: #be185d;
        text-align: center;
    }

    .btn-simpan {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border: none;
        border-radius: 1rem;
        padding: 0.7rem 2rem;
        font-weight: 700;
        font-size: 0.95rem;
        color: #fff;
        box-shadow: 0 6px 15px rgba(236, 72, 153, 0.25);
        transition: all 0.25s ease;
        margin-top: 0.5rem;
    }

    .btn-simpan:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.35);
        color: #fff;
    }
</style>

<?php echo csrf_field(); ?>

<div class="row g-4 mb-2">
    <div class="col-md-8">
        <div class="form-row">
            <label>Gambar</label>
            <input
                type="file"
                name="foto"
                accept="image/*"
                onchange="previewImage(this)"
                class="form-control-custom <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            >
            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback-custom"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="foto-box-wrap">
            <span class="foto-box-label">Preview Foto</span>
            <div class="foto-box">
                <?php if(isset($produk) && !empty($produk->foto)): ?>
                    <img id="preview" src="<?php echo e(asset('storage/'.$produk->foto)); ?>">
                <?php else: ?>
                    <img id="preview" style="display:none">
                    <span id="previewPlaceholder">Belum ada foto dipilih</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <label>Nama Produk</label>
    <input
        type="text"
        name="name"
        class="form-control-custom <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('name', $produk->nama ?? '')); ?>"
        placeholder="Masukkan nama produk"
    >
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback-custom"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-row">
    <label>Harga Beli</label>
    <input
        type="number"
        name="purchase_price"
        class="form-control-custom <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('purchase_price', $produk->harga_beli ?? '')); ?>"
        placeholder="0"
        min="0"
    >
    <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback-custom"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-row">
    <label>Harga Jual</label>
    <input
        type="number"
        name="selling_price"
        class="form-control-custom <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('selling_price', $produk->harga_jual ?? '')); ?>"
        placeholder="0"
        min="0"
    >
    <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback-custom"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-row">
    <label>Stok</label>
    <input
        type="number"
        name="stock"
        class="form-control-custom <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('stock', $produk->stok ?? '')); ?>"
        placeholder="0"
        min="0"
    >
    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback-custom"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<button class="btn-simpan" type="submit">Simpan</button>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('previewPlaceholder');
        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            if (placeholder) placeholder.style.display = 'none';
        }
    }
</script><?php /**PATH C:\laragon\www\apk_pos\resources\views/produk/_form.blade.php ENDPATH**/ ?>