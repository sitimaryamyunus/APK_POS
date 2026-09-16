@extends('layouts.app')

@section('title', 'POS')

@section('content')

@include('layouts.navbar')

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

    /* Panel QRIS */
    .qris-box {
        text-align: center;
        background: rgba(255, 255, 255, 0.75);
        border: 1px solid #fbcfe8;
        border-radius: 1.1rem;
        padding: 1.1rem;
        margin-bottom: 0.75rem;
    }

    .qris-box img {
        max-width: 200px;
        width: 100%;
        border: 3px solid #fbcfe8;
        border-radius: 1rem;
        padding: 8px;
        background: #fff;
        display: block;
        margin: 0 auto 0.75rem;
    }

    .qris-box p {
        color: #831843;
        font-size: 0.82rem;
        font-weight: 600;
        margin: 0;
    }
</style>

<div class="container pos-wrap py-4">

    @if(session('errors'))
        <div class="alert-custom">
            {{ session('errors') }}
        </div>
    @endif

    <div class="pos-title">
        {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
    </div>

    <div class="row g-3">

        {{-- ===================== PRODUK ===================== --}}
        <div class="col-md-6">
            <div class="pos-panel">
                <div class="pos-panel-body">

                    <form method="GET" action="{{ route('penjualan.create') }}">
                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control search-box-custom"
                            placeholder="Cari produk..."
                            onkeyup="this.form.submit()">
                    </form>

                    @foreach($products as $product)
                        <form method="POST" action="{{ route('itempenjualan.store') }}" class="row produk-row g-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="col-7">
                                <button class="btn-produk-item {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">
                                    <div class="produk-nama">{{ $product->nama }}</div>
                                    <div class="produk-harga">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</div>
                                </button>
                            </div>

                            <div class="col-3">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="form-control qty-input-custom"
                                    {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>
                            </div>

                            <div class="col-2">
                                <button class="btn-tambah-item w-100 h-100 {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">+</button>
                            </div>
                        </form>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- ===================== KERANJANG ===================== --}}
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
                        @forelse($sale->itemPenjualan as $item)
                            <tr>
                                <td class="text-start" style="font-weight: 600;">{{ $item->produk->nama }}</td>
                                <td>Rp {{ number_format($item->produk->harga_jual) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('itempenjualan.update', $item->id) }}">
                                        @csrf @method('PUT')
                                        <input type="number" name="quantity"
                                            value="{{ $item->kuantitas }}"
                                            min="1"
                                            class="qty-cart-input"
                                            onchange="this.form.submit()"
                                            {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>
                                    </form>
                                </td>
                                <td style="font-weight: 700; color: #9d174d;">Rp {{ number_format($item->subtotal) }}</td>
                                <td>
                                    @if(auth()->user()->role_id === 1)
                                        <form method="POST" action="{{ route('itempenjualan.destroy', $item->id) }}">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-hapus-item">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 empty-cart">
                                    Keranjang masih kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="cart-footer">
                    <span class="cart-total">Total: Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>

                    <form method="POST"
                        action="{{ route('penjualan.update', $sale->id) }}"
                        onsubmit="return confirm('Yakin ingin checkout?')">
                        @csrf
                        @method('PUT')

                        {{-- Perubahan: Menambahkan id="payment_method" dan event onchange --}}
                        <select id="payment_method" name="payment_method" class="form-select select-pembayaran mb-2" {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }} onchange="togglePembayaranCash()">
                            <option value="">Pilih Pembayaran</option>
                            <option value="CASH">Cash</option>
                            <option value="QRIS">QRIS</option>
                        </select>

                        {{-- ===================== BUNGKUS KHUSUS UNTUK CASH ===================== --}}
                        <div id="section_cash" style="display: none;">
                            {{-- Input Uang Dibayar --}}
                            <div class="mb-2">
                                <input type="number" 
                                    id="uang_dibayar" 
                                    name="uang_dibayar" 
                                    class="form-control mb-2" 
                                    placeholder="Uang Dibayar (Rp)..." 
                                    min="{{ $sale->total_pembayaran }}"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                    oninput="hitungKembalian()">
                            </div>

                            {{-- Teks Hasil Kembalian Otomatis --}}
                            <div class="mb-3 text-end" style="font-weight: bold; color: #15803d;">
                                Kembalian: <span id="label_kembalian">Rp 0</span>
                            </div>
                        </div>
                        {{-- ============================================================================== --}}

                        {{-- ===================== BUNGKUS KHUSUS UNTUK QRIS ===================== --}}
                        <div id="section_qris" style="display: none;">
                            <div class="qris-box">
                                {{-- Ganti src di bawah dengan gambar QRIS asli Rosé Cafe, mis. asset('images/qris-rosecafe.png') --}}
                                <img src="{{ asset('images/qris-rosecafe.png') }}" alt="Barcode QRIS Rosé Cafe" onerror="this.src='https://via.placeholder.com/200x200?text=QRIS'">
                                <p>Scan QRIS di atas untuk menyelesaikan pembayaran</p>
                            </div>
                        </div>
                        {{-- ============================================================================== --}}

                        <button class="btn-checkout" {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                            Checkout
                        </button>
                    </form>

                    @can('delete', $sale)
                        <form action="{{ route('penjualan.destroy', $sale->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-batal" {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                Batal Transaksi
                            </button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT JAVASCRIPT LOGIKA KASIR --}}
<script>
    // Fungsi untuk menyembunyikan / menampilkan kolom Cash / QRIS
    function togglePembayaranCash() {
        const method = document.getElementById('payment_method').value;
        const sectionCash = document.getElementById('section_cash');
        const sectionQris = document.getElementById('section_qris');
        const inputUang = document.getElementById('uang_dibayar');

        // Sembunyikan dulu semua section
        sectionCash.style.display = 'none';
        sectionQris.style.display = 'none';
        inputUang.required = false;

        if (method === 'CASH') {
            sectionCash.style.display = 'block'; // Tampilkan jika pilih Cash
            inputUang.required = true;           // Wajib diisi kalau Cash
            inputUang.value = '';                // Reset input
            document.getElementById('label_kembalian').innerText = 'Rp 0';
        } else if (method === 'QRIS') {
            sectionQris.style.display = 'block'; // Tampilkan barcode QRIS
            inputUang.value = '{{ $sale->total_pembayaran }}'; // Otomatis set senilai total agar validasi controller lolos
        } else {
            inputUang.value = '{{ $sale->total_pembayaran }}';
        }
    }

    // Fungsi hitung kembalian real-time
    function hitungKembalian() {
        const total = {{ $sale->total_pembayaran }};
        let rawValue = document.getElementById('uang_dibayar').value;
        let cleanValue = rawValue.replace(/\./g, ''); 
        
        const dibayar = parseFloat(cleanValue) || 0;
        const kembalian = dibayar - total;

        if (kembalian >= 0) {
            document.getElementById('label_kembalian').innerText = 'Rp ' + kembalian.toLocaleString('id-ID');
        } else {
            document.getElementById('label_kembalian').innerText = 'Uang kurang';
        }
    }

    // Jalankan fungsi saat halaman pertama kali dimuat untuk menyesuaikan status awal
    document.addEventListener("DOMContentLoaded", function() {
        togglePembayaranCash();
    });
</script>

@endsection