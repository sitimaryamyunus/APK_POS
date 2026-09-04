@extends('layouts.app')

@section('title', 'Masuk POS CAFE')

@section('content')
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

.login-wrapper::before,
.login-wrapper::after {
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

.login-wrapper::before {
    top: -10%;
    right: -5%;
}

.login-wrapper::after {
    bottom: -15%;
    left: -5%;
}

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
    width: 75px;
    /* Sedikit diperlebar agar ikon bangunan cafe presisi */
    height: 75px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 16px rgba(219, 39, 119, 0.08);
}

.card-header svg {
    width: 44px;
    height: 44px;
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
            <!-- Pemasangan Vektor Ikon Cafe Baru -->
            <div class="icon-badge">
                <svg viewBox="0 0 512 512" xmlns="http://w3.org">
                    <path
                        d="M434.9,493.5H77.1a18.6,18.6,0,0,1-18.6-18.6V180.3a18.6,18.6,0,0,1,18.6-18.6H434.9a18.6,18.6,0,0,1,18.6,18.6V474.9A18.6,18.6,0,0,1,434.9,493.5Z"
                        fill="#fbcfe8" />
                    <path
                        d="M453.5,180.3V474.9a18.6,18.6,0,0,1-18.6,18.6H77.1a18.6,18.6,0,0,1-18.6-18.6V180.3m395-18.6H77.1a18.6,18.6,0,0,0-18.6,18.6V474.9a18.6,18.6,0,0,0,18.6,18.6H434.9a18.6,18.6,0,0,0,18.6-18.6V180.3A18.6,18.6,0,0,0,453.5,161.7Z"
                        fill="#4c0519" />
                    <path
                        d="M482.4,161.7H29.6a18.6,18.6,0,0,1-18.6-18.6V105.9A18.6,18.6,0,0,1,29.6,87.3H482.4a18.6,18.6,0,0,1,18.6,18.6v37.2A18.6,18.6,0,0,1,482.4,161.7Z"
                        fill="#ec4899" />
                    <path
                        d="M501,105.9v37.2a18.6,18.6,0,0,1-18.6,18.6H29.6a18.6,18.6,0,0,1-18.6-18.6V105.9A18.6,18.6,0,0,1,29.6,87.3H482.4A18.6,18.6,0,0,1,501,105.9Zm-18.6-37.2H29.6A37.2,37.2,0,0,0,-7.6,105.9v37.2a37.2,37.2,0,0,0,37.2,37.2H482.4a37.2,37.2,0,0,0,37.2-37.2V105.9A37.2,37.2,0,0,0,482.4,68.7Z"
                        fill="#4c0519" />
                    <rect x="91" y="112" width="330" height="25" fill="#ffffff" rx="5" />
                    <path d="M141.6,493.5H91.5V263.1a25,25,0,0,1,25-25h0a25,25,0,0,1,25,25Z" fill="#be185d" />
                    <path
                        d="M141.6,493.5V263.1a25,25,0,0,0-25-25h0a25,25,0,0,0-25,25V493.5h50m18.6,18.6H72.9V263.1a43.6,43.6,0,0,1,43.6-43.6h0a43.6,43.6,0,0,1,43.6,43.6V512.1Z"
                        fill="#4c0519" />
                    <path
                        d="M401.9,354.2H223.7a12.4,12.4,0,0,1-12.4-12.4V250.7a12.4,12.4,0,0,1,12.4-12.4H401.9a12.4,12.4,0,0,1,12.4,12.4V341.8A12.4,12.4,0,0,1,401.9,354.2Z"
                        fill="#ffffff" />
                    <path
                        d="M401.9,238.3A12.4,12.4,0,0,1,414.3,250.7V341.8a12.4,12.4,0,0,1-12.4,12.4H223.7a12.4,12.4,0,0,1-12.4-12.4V250.7a12.4,12.4,0,0,1,12.4-12.4H401.9Zm0-18.6H223.7A31,31,0,0,0,192.7,250.7V341.8a31,31,0,0,0,31,31H401.9a31,31,0,0,0,31-31V250.7A31,31,0,0,0,401.9,219.7Z"
                        fill="#4c0519" />
                    <path d="M220,230c15,0,20,15,35,15s20-15,35-15,20,15,35,15,20-15,35-15" fill="none" stroke="#4c0519"
                        stroke-width="12" stroke-linecap="round" />
                </svg>
            </div>
            <!-- Perubahan Nama Judul -->
            <h5>Masuk POS CAFE</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('auth') }}" method="POST">
                @csrf

                <div class="mb-3 text-start">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <div class="input-group-custom">
                        <svg class="input-icon-left" xmlns="http://w3.org" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Masukan Email" autocomplete="off">
                    </div>
                    @error('email')
                    <div class="custom-error-badge">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 text-start">
                    <label for="exampleInputPassword1" class="form-label">Kata sandi</label>
                    <div class="input-group-custom password-wrapper">
                        <svg class="input-icon-left" xmlns="http://w3.org" viewBox="0 0 16 16">
                            <path
                                d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1.5 1.5H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Masukan Kata Sandi">
                        <button type="button" class="toggle-password" id="togglePassword"
                            aria-label="Tampilkan kata sandi">
                            <svg id="eyeIcon" xmlns="http://w3.org" viewBox="0 0 16 16" fill="currentColor">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0v0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">Masuk POS</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('togglePassword');
    const passwordField = document.getElementById('exampleInputPassword1');
    const eyeIcon = document.getElementById('eyeIcon');

    if (toggleButton && passwordField) {
        toggleButton.onclick = function(e) {
            e.preventDefault();
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                if (eyeIcon) {
                    eyeIcon.setAttribute('fill', '#db2777');
                    eyeIcon.innerHTML =
                        '<path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a11.95 11.95 0 0 0-2.778.344l1.157 1.157A11.77 11.77 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755q-.247.248-.516.467zM11.242 9.123 9.123 7.004a2.5 2.5 0 0 0-3.12 3.12l2.12-2.122a.5.5 0 0 1 .707 0l1.414 1.414a.5.5 0 0 1 0 .707l-2.12 2.122a2.5 2.5 0 0 0 3.12-3.12M1 8s3-5.5 8-5.5a11.95 11.95 0 0 1 2.778.344l-1.157 1.157A11.77 11.77 0 0 0 8 4.5c-2.12 0-3.879 1.168-5.168 2.457A13.134 13.134 0 0 0 1.172 8c.058.087.122.183.195.288.335.48.83 1.12 1.465 1.755q.247.248.516.467l-1.158 1.158L1 8z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708z"/>';
                }
            } else {
                passwordField.type = 'password';
                if (eyeIcon) {
                    eyeIcon.setAttribute('fill', 'currentColor');
                    eyeIcon.innerHTML =
                        '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0v0z"/>';
                }
            }
        };
    }
});
</script>
@endsection