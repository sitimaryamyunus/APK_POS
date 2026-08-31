

<?php $__env->startSection('title', 'Tambah Pengguna'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .login-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
        overflow: hidden;
    }

    .login-wrapper::before, .login-wrapper::after {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: linear-gradient(45deg, #fbcfe8, #f472b6);
        z-index: 1;
        opacity: 0.5;
        filter: blur(80px);
    }
    .login-wrapper::before { top: -10%; right: -5%; }
    .login-wrapper::after { bottom: -15%; left: -5%; }

    .login-card {
        width: 28rem;
        background: rgba(255, 255, 255, 0.65);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 2.25rem;
        overflow: hidden;
        box-shadow: 
            0 20px 40px -15px rgba(219, 39, 119, 0.1),
            0 0 50px 0px rgba(251, 207, 232, 0.4);
        animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        z-index: 2;
    }

    .login-card .card-header {
        background: transparent;
        color: #db2777;
        border: none;
        padding: 2.5rem 1.5rem 0.5rem 1.5rem;
        font-weight: 700;
        font-size: 1.6rem;
        letter-spacing: -0.5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .login-card .card-body {
        background: transparent;
        padding: 1rem 2.25rem 2.5rem 2.25rem;
    }

    .login-card .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: #be185d;
        margin-bottom: 0.5rem;
        letter-spacing: 0.3px;
    }

    .login-card .form-control, .login-card .form-select {
        border-radius: 1.25rem !important;
        border: 1px solid #fbcfe8 !important;
        padding: 0.85rem 1.2rem !important;
        transition: all 0.25s ease !important;
        background: rgba(255, 255, 255, 0.8) !important;
        color: #4c0519 !important;
        font-weight: 500 !important;
        width: 100%;
    }

    .login-card .form-control:focus, .login-card .form-select:focus {
        border-color: #ec4899 !important;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15) !important;
        background: #fff !important;
    }

    .btn-custom-simpan {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border: none;
        border-radius: 1.25rem;
        padding: 0.9rem;
        font-weight: 700;
        color: #ffffff; 
        transition: all 0.25s ease;
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.25);
        letter-spacing: 0.5px;
    }

    .btn-custom-simpan:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(236, 72, 153, 0.35);
        color: #ffffff;
    }

    .btn-custom-kembali {
        border-radius: 1.25rem;
        padding: 0.9rem;
        font-weight: 700;
        transition: all 0.25s ease;
    }

    .btn-custom-kembali:hover {
        transform: translateY(-2px);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="login-wrapper">
    <div class="card login-card">
        <div class="card-header text-center">
            <h5 class="fw-bold m-0" style="color: #db2777; font-size: 1.5rem;">Tambah Pengguna</h5>
        </div>
        <div class="card-body">
            <!-- Form utama pengiriman data tambah user -->
            <form action="<?php echo e(route('admin.users.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <!-- Memuat file input form bawaan milik Anda -->
                <?php echo $__env->make('users._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </form>
        </div>
    </div>
</div>

<script>
    // Script otomatis menyesuaikan class tombol agar serasi dengan layout baru
    document.addEventListener('DOMContentLoaded', function () {
        const btnSimpan = document.querySelector('.card-body button[type="submit"]');
        const btnKembali = document.querySelector('.card-body a.btn-secondary');

        if (btnSimpan) {
            btnSimpan.className = "btn btn-custom-simpan w-100 mb-2";
        }
        if (btnKembali) {
            btnKembali.className = "btn btn-secondary btn-custom-kembali w-100";
            
            const parent = btnSimpan.parentNode;
            if(parent && !parent.classList.contains('d-grid')) {
                parent.className = "d-grid gap-2 mt-4";
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POSS\resources\views/users/create.blade.php ENDPATH**/ ?>