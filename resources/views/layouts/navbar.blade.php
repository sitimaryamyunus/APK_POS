<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
    <div class="container"> 
        <!-- Logo Brand: Ikon Cafe + Tulisan POS CAFE -->
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#" style="color: #be185d;">
            <!-- Ikon Kedai Kopi Mini -->
            <div style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; background: #fdf2f8; border: 1px solid #fbcfe8; border-radius: 6px; padding: 3px;">
                <svg viewBox="0 0 512 512" xmlns="http://w3.org" style="width: 100%; height: 100%;">
                    <path d="M434.9,493.5H77.1a18.6,18.6,0,0,1-18.6-18.6V180.3a18.6,18.6,0,0,1,18.6-18.6H434.9a18.6,18.6,0,0,1,18.6,18.6V474.9A18.6,18.6,0,0,1,434.9,493.5Z" fill="#fbcfe8"/>
                    <path d="M453.5,180.3V474.9a18.6,18.6,0,0,1-18.6,18.6H77.1a18.6,18.6,0,0,1-18.6-18.6V180.3m395-18.6H77.1a18.6,18.6,0,0,0-18.6,18.6V474.9a18.6,18.6,0,0,0,18.6,18.6H434.9a18.6,18.6,0,0,0,18.6-18.6V180.3A18.6,18.6,0,0,0,453.5,161.7Z" fill="#4c0519"/>
                    <path d="M482.4,161.7H29.6a18.6,18.6,0,0,1-18.6-18.6V105.9A18.6,18.6,0,0,1,29.6,87.3H482.4a18.6,18.6,0,0,1,18.6,18.6v37.2A18.6,18.6,0,0,1,482.4,161.7Z" fill="#ec4899"/>
                    <path d="M501,105.9v37.2a18.6,18.6,0,0,1-18.6,18.6H29.6a18.6,18.6,0,0,1-18.6-18.6V105.9A18.6,18.6,0,0,1,29.6,87.3H482.4A18.6,18.6,0,0,1,501,105.9Zm-18.6-37.2H29.6A37.2,37.2,0,0,0,-7.6,105.9v37.2a37.2,37.2,0,0,0,37.2,37.2H482.4a37.2,37.2,0,0,0,37.2-37.2V105.9A37.2,37.2,0,0,0,482.4,68.7Z" fill="#4c0519"/>
                    <rect x="91" y="112" width="330" height="25" fill="#ffffff" rx="5"/>
                    <path d="M141.6,493.5H91.5V263.1a25,25,0,0,1,25-25h0a25,25,0,0,1,25,25Z" fill="#be185d"/>
                    <path d="M141.6,493.5V263.1a25,25,0,0,0-25-25h0a25,25,0,0,0-25,25V493.5h50m18.6,18.6H72.9V263.1a43.6,43.6,0,0,1,43.6-43.6h0a43.6,43.6,0,0,1,43.6,43.6V512.1Z" fill="#4c0519"/>
                    <path d="M401.9,354.2H223.7a12.4,12.4,0,0,1-12.4-12.4V250.7a12.4,12.4,0,0,1,12.4-12.4H401.9a12.4,12.4,0,0,1,12.4,12.4V341.8A12.4,12.4,0,0,1,401.9,354.2Z" fill="#ffffff"/>
                    <path d="M401.9,238.3A12.4,12.4,0,0,1,414.3,250.7V341.8a12.4,12.4,0,0,1-12.4,12.4H223.7a12.4,12.4,0,0,1-12.4-12.4V250.7a12.4,12.4,0,0,1,12.4-12.4H401.9Zm0-18.6H223.7A31,31,0,0,0,192.7,250.7V341.8a31,31,0,0,0,31,31H401.9a31,31,0,0,0,31-31V250.7A31,31,0,0,0,401.9,219.7Z" fill="#4c0519"/>
                    <path d="M220,230c15,0,20,15,35,15s20-15,35-15,20,15,35,15,20-15,35-15" fill="none" stroke="#4c0519" stroke-width="12" stroke-linecap="round"/>
                </svg>
            </div>
            <span style="letter-spacing: -0.3px;">POS CAFE</span>
        </a> 
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                <li class="nav-item"> 
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a> 
                </li> 
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') || Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a>
                </li>
                
                <!-- MENU BARU: Menyisipkan Jenis sebelum Produk dengan Indentasi Rapi -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/jenis*') ? 'active' : '' }}" href="{{ route('admin.jenis.index') }}">Jenis</a>
                </li>
                
                <li class="nav-item"> 
                    <a class="nav-link {{ Request::is('produk*') || Request::is('produk') ? 'active' : '' }}" href="{{ route('produk.index') }}">Produk</a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link {{ Request::is('penjualan*') || Request::is('penjualan') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">Penjualan</a> 
                </li>
            </ul> 
            
            <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center m-0"> 
                @csrf 
                <button type="submit" class="btn btn-logout btn-sm px-3 fw-bold">Keluar</button> 
            </form> 
        </div> 
    </div> 
</nav>

<style>
    /* Mengubah tombol keluar menjadi gradasi pink estetik */
    .btn-logout {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%) !important;
        border: none !important;
        color: #fff !important;
        border-radius: 0.65rem;
        padding: 0.45rem 1.1rem;
        transition: all 0.2s ease;
        box-shadow: 0 4px 10px rgba(236, 72, 153, 0.15);
    }
    .btn-logout:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(236, 72, 153, 0.25);
        color: #fff !important;
    }
</style>
