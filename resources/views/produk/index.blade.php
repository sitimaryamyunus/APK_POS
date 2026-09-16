@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<style>
    /* Latar Belakang Gradasi Feminin Estetik */
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .produk-wrap {
        max-width: 1200px;
    }

    /* Section wrapper agar konten punya "rumah" yang jelas */
    .produk-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    /* Header halaman: judul + tombol tambah sejajar */
    .produk-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .produk-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .produk-header h1::before {
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
        border-radius: 1rem 0 0 1rem;
        border: 1px solid #fbcfe8;
        padding: 0.6rem 1.1rem;
        background: rgba(255, 255, 255, 0.85);
        color: #4c0519;
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .search-box-custom:focus {
        border-color: #ec4899;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15);
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
        background: transparent;
    }

    .table tbody tr:last-child {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.6) !important;
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

    /* Foto Produk Bingkai Halus */
    .img-thumbnail-custom {
        border: 2px solid #fbcfe8;
        border-radius: 0.65rem;
        padding: 2px;
        background-color: #fff;
        width: 42px;
        height: 42px;
        object-fit: cover;
    }

    .table .text-muted {
        color: #f472b6 !important;
        font-weight: 500;
    }

    /* Stok kritis */
    .stok-rendah {
        color: #e11d48;
        font-weight: 700;
    }

    /* Tombol Tambah Produk */
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

    .btn-detail {
        background-color: rgba(243, 232, 255, 0.7);
        border: 1px solid #e9d5ff;
        color: #7e22ce;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 0.6rem;
        padding: 0.35rem 0.85rem;
        transition: all 0.2s;
    }

    .btn-detail:hover {
        background-color: #a855f7;
        border-color: #a855f7;
        color: #fff;
    }

    /* Modal Detail Produk */
    .detail-modal-content {
        border: none;
        border-radius: 1.5rem;
        overflow: hidden;
    }

    .detail-modal-header {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 100%);
        border: none;
        padding: 1.5rem 1.75rem 1rem;
    }

    .detail-modal-header h5 {
        color: #9d174d;
        font-weight: 800;
        margin: 0;
    }

    .detail-photo {
        width: 100%;
        max-width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 1rem;
        border: 3px solid #fbcfe8;
        background: #fff;
        display: block;
        margin: 0 auto 1.25rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.65rem 0;
        border-bottom: 1px solid #fbcfe8;
        font-size: 0.9rem;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        color: #be185d;
        font-weight: 700;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .detail-value {
        color: #4c0519;
        font-weight: 600;
        text-align: right;
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
        .produk-section {
            padding: 1.25rem;
        }
    }
</style>

<div class="container produk-wrap py-4">
    <div class="produk-section">

        @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; padding: 15px 20px; margin-bottom: 20px; border-radius: 8px; font-size: 15px; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <div class="produk-header">
            <h1>Halaman Produk</h1>
            @can('create', App\Models\Produk::class)
                <a href="{{ route('produk.create') }}" class="btn btn-buat">Tambah Produk Baru</a>
            @endcan
        </div>

        <form action="{{ route('produk.index') }}" method="GET" class="search-form">
            <div class="input-group" style="max-width: 400px;">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control search-box-custom"
                    placeholder="Cari nama produk..."
                >
                <button class="btn btn-cari-custom" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <div class="table-card">
            <table class="table table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;">No</th>
                        <th scope="col">Pengguna</th>
                        <th scope="col" style="width: 70px;">Foto</th>
                        <th scope="col" class="text-start">Nama</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col" style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                            <td>{{ $product->user?->name ?? 'Tidak Ada Pengguna' }}</td>
                            <td>
                                <img
                                    src="{{ asset('storage/'.$product->foto) }}"
                                    class="img-thumbnail-custom"
                                    onerror="this.src='https://via.placeholder.com/42?text=%20'"
                                >
                            </td>
                            <td class="text-start" style="font-weight: 600;">{{ $product->nama }}</td>
                            <td>Rp {{ number_format($product->harga_beli) }}</td>
                            <td>Rp {{ number_format($product->harga_jual) }}</td>
                            <td>
                                <span class="{{ $product->stok <= 5 ? 'stok-rendah' : '' }}">
                                    {{ $product->stok }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <button type="button" class="btn btn-detail btn-sm" data-bs-toggle="modal" data-bs-target="#detailProdukModal{{ $product->id }}">
                                        Detail
                                    </button>

                                    @can('update', $product)
                                        <a href="{{ route('produk.edit', $product) }}" class="btn btn-edit-akun btn-sm">Edit</a>
                                    @endcan

                                    @can('delete', $product)
                                        <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-hapus btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <h5 class="m-0" style="font-style: italic;">Data produk tidak tersedia.</h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>

    </div>
</div>

{{-- 🔍 MODAL DETAIL PRODUK --}}
@foreach ($products as $product)
<div class="modal fade" id="detailProdukModal{{ $product->id }}" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(4px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content detail-modal-content shadow-lg">
            <div class="detail-modal-header d-flex align-items-center justify-content-between">
                <h5>Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-4">
                <img
                    src="{{ asset('storage/'.$product->foto) }}"
                    class="detail-photo"
                    onerror="this.src='https://via.placeholder.com/180?text=%20'"
                >
                <h4 class="text-center mb-3" style="color:#4c0519; font-weight:800;">{{ $product->nama }}</h4>

                <div class="detail-row">
                    <span class="detail-label">Pengguna</span>
                    <span class="detail-value">{{ $product->user?->name ?? 'Tidak Ada Pengguna' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Harga Beli</span>
                    <span class="detail-value">Rp {{ number_format($product->harga_beli) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Harga Jual</span>
                    <span class="detail-value">Rp {{ number_format($product->harga_jual) }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Stok</span>
                    <span class="detail-value {{ $product->stok <= 5 ? 'stok-rendah' : '' }}">{{ $product->stok }}</span>
                </div>
            </div>
            <div class="modal-footer border-0 pb-4 px-4 pt-0">
                <button type="button" class="btn btn-light border btn-sm" data-bs-dismiss="modal" style="border-radius: 0.75rem; padding: 0.5rem 1.2rem; font-weight: 600;">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection