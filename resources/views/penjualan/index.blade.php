@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gradasi Feminin Estetik Asli Anda */
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .penjualan-wrap {
        max-width: 1200px;
    }

    /* Section wrapper agar konten punya "rumah" yang jelas */
    .penjualan-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 10px 30px rgba(219, 39, 119, 0.03);
    }

    /* Header halaman: judul + tombol tambah sejajar */
    .penjualan-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .penjualan-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .penjualan-header h1::before {
        content: "";
        width: 6px;
        height: 1.05rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    /* Formulir Pencarian Modern */
    .search-form {
        margin-bottom: 1.5rem;
    }

    .search-box-custom {
        border-radius: 1rem 0 0 1rem !important;
        border: 1px solid #fbcfe8 !important;
        padding: 0.6rem 1.1rem;
        background: rgba(255, 255, 255, 0.85);
        color: #4c0519;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .search-box-custom:focus {
        border-color: #ec4899 !important;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15) !important;
        background: #fff;
    }

    .search-box-custom::placeholder {
        color: #f472b6;
        opacity: 0.7;
    }

    .btn-cari-custom {
        background-color: rgba(255, 255, 255, 0.75);
        border: 1px solid #fbcfe8;
        border-left: none;
        color: #be185d;
        font-weight: 600;
        padding: 0 1.25rem;
        border-radius: 0 1rem 1rem 0 !important;
        transition: all 0.2s;
    }

    .btn-cari-custom:hover {
        background-color: #fdf2f8;
        color: #9d174d;
    }

    /* Kartu Pembungkus Tabel */
    .table-card {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 25px rgba(219, 39, 119, 0.05);
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
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        color: #9d174d !important;
        padding: 0.9rem 0.75rem;
        white-space: nowrap;
    }

    .table tbody tr {
        border-bottom: 1px solid rgba(251, 207, 232, 0.25);
        background-color: #fff !important;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: rgba(253, 242, 248, 0.6) !important;
    }

    .table tbody td,
    .table tbody th {
        padding: 0.8rem 0.75rem;
        color: #4c0519;
        font-weight: 500;
        font-size: 0.9rem;
        vertical-align: middle;
        border: none;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.35rem 0.85rem;
        border-radius: 0.65rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
    }

    .status-completed {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    .status-open {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }

    /* Tombol Tambah Produk Baru */
    .btn-buat {
        background: linear-gradient(135deg, #f472b6 0%, #ec4899 100%);
        border: none;
        border-radius: 1rem;
        padding: 0.6rem 1.4rem;
        font-weight: 700;
        font-size: 0.9rem;
        color: #fff;
        box-shadow: 0 6px 15px rgba(236, 72, 153, 0.25);
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .btn-buat:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.35);
        color: #fff;
    }

    /* Tombol Aksi */
    .btn-detail {
        background-color: rgba(251, 207, 232, 0.3);
        border: 1px solid #fbcfe8;
        color: #be185d;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 0.6rem;
        padding: 0.35rem 0.85rem;
        transition: all 0.2s;
    }

    .btn-detail:hover {
        background-color: #ec4899;
        border-color: #ec4899;
        color: #fff;
    }

    .btn-edit-akun {
        background-color: rgba(251, 207, 232, 0.6);
        border: 1px solid #fbcfe8;
        color: #be185d;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 0.6rem;
        padding: 0.35rem 0.85rem;
        transition: all 0.2s;
    }

    .btn-edit-akun:hover {
        background-color: #ec4899;
        border-color: #ec4899;
        color: #fff;
    }

    .btn-hapus {
        background-color: rgba(254, 228, 226, 0.7);
        border: 1px solid #fecdd3;
        color: #e11d48;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 0.6rem;
        padding: 0.35rem 0.85rem;
        transition: all 0.2s;
    }

    .btn-hapus:hover {
        background-color: #e11d48;
        border-color: #e11d48;
        color: #fff;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 1.25rem;
    }

    .pagination-wrapper p {
        display: none !important;
    }

    .pagination .page-link {
        color: #db2777;
        background-color: rgba(255, 255, 255, 0.6);
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

    @media (max-width: 767px) {
        .penjualan-section { padding: 1.25rem; }
    }
</style>

<div class="container penjualan-wrap py-4">
    <div class="penjualan-section">

        <div class="penjualan-header">
            <h1>Halaman Penjualan</h1>
            <a href="{{ route('penjualan.create') }}" class="btn btn-buat">Tambah Transaksi Baru</a>
        </div>

        @if(session('errors'))
            <div class="alert alert-danger mb-3" style="border-radius: 0.75rem;">
                {{ session('errors') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success mb-3" style="border-radius: 0.75rem;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('penjualan.index') }}" method="GET" class="search-form mb-4">
            <div class="input-group" style="max-width: 400px;">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control search-box-custom"
                    placeholder="Cari data penjualan..."
                >
                <button class="btn btn-cari-custom" type="submit">Cari</button>
            </div>
        </form>

        <div class="table-card">
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col" style="width: 60px;">No</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col" class="text-start">Kasir</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col" style="width: 140px;">Status</th>
                        <th scope="col" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                                        @forelse($sales as $sale)
                    <tr>
                        <th scope="row">{{ $sales->firstItem() + $loop->index }}</th>
                        <td style="font-weight: 600;">{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
                        <td class="text-start fw-semibold">{{ $sale->user->name ?? 'Sistem' }}</td>
                        <td style="font-weight: 700; color: #be185d;">Rp {{ number_format($sale->total_pembayaran ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge text-bg-light border px-2 py-1" style="border-radius: 0.5rem; font-weight: 600;">
                                {{ $sale->metode_pembayaran }}
                            </span>
                        </td>
                        <td>
                            <span class="status-badge {{ strtolower($sale->status ?? '') == 'completed' ? 'status-completed' : 'status-open' }}">
                                {{ $sale->status }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <!-- Tombol pemicu popup detail modal bootstrap asli -->
                                <button type="button" class="btn btn-detail btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $sale->id }}">
                                    Detail
                                </button>
                                
                                @can('view', $sale)
                                    <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-edit-akun btn-sm">Edit</a>
                                @endcan
                                
                                @can('delete', $sale)
                                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                        Hapus
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <h5 class="m-0" style="font-style: italic;">Data Tidak Ditemukan</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="d-flex justify-content-end mt-4 pagination-wrapper">
        {{ $sales->links() }}
    </div>
</div>

<!-- BLOK POPUP MODAL DETAIL ITEMS -->
@foreach($sales as $sale)
<div class="modal fade" id="detailModal{{ $sale->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $sale->id }}" aria-hidden="true" style="backdrop-filter: blur(4px); text-align: left !important;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 1.5rem;">
            <div class="modal-header border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="modal-title fw-bold" id="detailModalLabel{{ $sale->id }}" style="color: #9d174d;">
                    <span style="border-left: 5px solid #ec4899; padding-left: 8px;">Rincian Nota Penjualan</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <div class="row g-3 mb-4 p-3 rounded-3" style="background-color: #fdf2f8; border: 1px solid #fbcfe8;">
                    <div class="col-md-6">
                        <small class="text-muted d-block fw-bold">TANGGAL NOTA</small>
                        <span class="fw-semibold text-dark">{{ $sale->created_at->translatedFormat('d F Y H:i:s') }}</span>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted d-block fw-bold">PETUGAS KASIR</small>
                        <span class="fw-semibold text-dark">{{ $sale->user->name ?? 'Sistem' }}</span>
                    </div>
                </div>

                <h6 class="fw-bold mb-2" style="color: #be185d;">Daftar Barang Belanja</h6>
                <div class="table-responsive rounded-3 border">
                    <table class="table table-sm m-0 align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="padding: 0.5rem; color: #9d174d;">No</th>
                                <th class="text-start" style="color: #9d174d;">Nama Produk</th>
                                <th style="color: #9d174d;">Harga Satuan</th>
                                <th style="color: #9d174d;">Qty</th>
                                <th class="text-end" style="padding-right: 1rem; color: #9d174d;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sale->itemPenjualan as $idx => $item)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td class="text-start fw-semibold">{{ $item->produk->nama ?? $item->produk->name ?? 'Produk Dihapus' }}</td>
                                <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                <td class="fw-bold">{{ $item->kuantitas }}</td>
                                <td class="text-end fw-bold" style="color: #be185d; padding-right: 1rem;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">Tidak ada rincian item barang.</td>
                            </tr>
                            @endforelse
                            <tr class="table-light fw-bold" style="border-top: 2px solid #fbcfe8;">
                                <td colspan="4" class="text-end py-2" style="color: #4c0519;">TOTAL AKHIR :</td>
                                <td class="text-end py-2" style="font-size: 1.05rem; padding-right: 1rem; color: #be185d;">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
