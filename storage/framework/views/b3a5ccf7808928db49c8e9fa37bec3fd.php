<?php $__env->startSection('title', 'ini Halaman Ujicoba'); ?>

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
        width: 24rem;
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

    .icon-badge {
        background: linear-gradient(135deg, #fdf2f8, #fce7f3);
        border: 1px solid #fbcfe8;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 16px rgba(219, 39, 119, 0.08);
    }

    .card-header svg {
        width: 32px;
        height: 32px;
        fill: #ec4899;
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

    .input-group-custom {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon-left {
        position: absolute;
        left: 1.1rem;
        width: 18px;
        height: 18px;
        fill: #f472b6;
        pointer-events: none;
        transition: fill 0.25s ease;
    }

    .login-card .form-control {
        border-radius: 1.25rem;
        border: 1px solid #fbcfe8;
        padding: 0.85rem 1rem 0.85rem 2.8rem;
        transition: all 0.25s ease;
        background: rgba(255, 255, 255, 0.8);
        color: #4c0519;
        font-weight: 500;
        width: 100%;
    }

    .login-card .form-control::placeholder {
        color: #f472b6;
        opacity: 0.6;
    }

    .login-card .form-control:focus {
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
        background: #fff;
        color: #4c0519;
    }

    .input-group-custom:focus-within .input-icon-left {
        fill: #db2777;
    }

    .custom-error-badge {
        display: block;
        background-color: #ffe4e6;
        border: 1px solid #fecdd3;
        color: #e11d48;
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
        border-radius: 0.75rem;
        margin-top: 0.5rem;
        font-weight: 500;
    }

    .btn-login {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border: none;
        border-radius: 1.25rem;
        padding: 0.9rem;
        font-weight: 700;
        color: #ffffff; 
        width: 100%;
        transition: all 0.25s ease;
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.25);
        margin-top: 1.25rem;
        letter-spacing: 0.5px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(236, 72, 153, 0.35);
        color: #ffffff;
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .password-wrapper {
        width: 100%;
    }

    .password-wrapper .form-control {
        padding-right: 3rem;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 1.1rem;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0;
        color: #f472b6;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: color 0.2s ease;
    }

    .toggle-password:hover {
        color: #db2777;
    }

    .toggle-password svg {
        width: 20px;
        height: 20px;
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
    <div class="card login-card text-center">
        <div class="card-header">
            <div class="icon-badge">
                <svg xmlns="http://w3.org" viewBox="0 0 16 16">
                    <path d="M8 1a3.5 3.5 0 0 0-3.5 3.5V7H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-.5V4.5A3.5 3.5 0 0 0 8 1zm2.5 6h-5V4.5a2.5 2.5 0 0 1 5 0V7z"/>
                </svg>
            </div>
            <h5>Masuk POS</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('auth')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Alamat email</label>
                    <div class="input-group-custom">
                        <svg class="input-icon-left" xmlns="http://w3.org" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="nama@email.com" autocomplete="off">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="custom-error-badge"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4 text-start">
                    <label for="exampleInputPassword1" class="form-label">Kata sandi</label>
                    <div class="input-group-custom password-wrapper">
                        <svg class="input-icon-left" xmlns="http://w3.org" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1.5 1.5H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="••••••••">
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan kata sandi">
                            <svg id="eyeIcon" xmlns="http://w3.org" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="custom-error-badge"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-login">Masuk POS</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('exampleInputPassword1');
        const eyeIcon = document.getElementById('eyeIcon');

        const eyeOpen = `<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>`;

        const eyeClosed = `<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 2.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_pos\resources\views/login.blade.php ENDPATH**/ ?>