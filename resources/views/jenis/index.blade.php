@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .jenis-wrap {
        max-width: 1000px;
    }

    .jenis-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem;
        backdrop-filter: blur(8px);
        box-shadow: 0 10px 30px rgba(219, 39, 119, 0.03);
    }

    .jenis-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .jenis-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .jenis-header h1::before {
        content: "";
        width: 6px;
        height: 1.05rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    .search-box-custom {
        border-radius: 1rem 0 0 1rem !important;
        border: 1px solid #fbcfe8 !important;
        padding: 0.6rem 1.1rem;
        background: rgba(255, 255, 255, 0.85);
        color: #4c0519;
    }

    .btn-cari-custom {
        background-color: rgba(255, 255, 255, 0.75);
        border: 1px solid #fbcfe8;
        color: #be185d;
        font-weight: 600;
        border-radius: 0 1rem 1rem 0 !important;
    }

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
    }

    .btn-buat:hover {
        transform: translateY(-2px);
        color: #fff;
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.35);
    }

    .table-card {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.6);
    }

    .table thead tr {
        background: rgba(251, 207, 232, 0.55) !important;
    }

    .table thead th {
        font-weight: 700;
        font-size: 0.78rem;
        text-transform: uppercase;
        color: #9d174d !important;
        padding: 0.9rem 0.75rem;
    }
</style>

<div class="container jenis-wrap py-4">
    <div class="jenis-section">

        <div class="jenis-header">
            <h1>Halaman Jenis</h1>
            @if(auth()->user()->role->name === 'admin')
                <button type="button" class="btn btn-buat" data-bs-toggle="modal" data-bs-target="#tambahJenisModal">
                    Tambahkan Jenis Baru
                </button>
            @endif
        </div>

        @if(session('success'))
            <div class="alert alert-success mb-3" style="border-radius: 0.75rem;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.jenis.index') }}" method="GET" class="search-form mb-4">
            <div class="input-group" style="max-width: 400px;">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control search-box-custom"
                    placeholder="Cari jenis produk..."
                >
                <button class="btn btn-cari-custom" type="submit">Cari</button>
            </div>
        </form>

        <div class="table-card">
            <table class="table table-hover align-middle text-center m-0">
                <thead>
                    <tr>
                        <th scope="col" style="width: 80px;">No</th>
                        <th scope="col" class="text-start">Nama Jenis / Kategori</th>
                        <th scope="col" style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                        <td class="text-start fw-semibold">{{ $category->nama_jenis }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                {{-- 🔒 PEMBATASAN AKSES: Tombol Edit dan Hapus hanya akan muncul jika Admin yang login --}}
                                @if(auth()->user()->role->name === 'admin')
                                    <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editJenisModal{{ $category->id }}" 
                                        style="background-color: #fce7f3 !important; color: #9d174d !important; border: 1px solid #fbcfe8 !important; border-radius: 12px !important; padding: 6px 16px; font-weight: 600; font-size: 14px; box-shadow: none;">
                                           Edit
                                    </button>
                                    
                                    <form action="{{ route('admin.jenis.destroy', $category->id) }}" method="POST" class="d-inline m-0" onsubmit="return confirm('Apakah anda yakin akan menghapus jenis kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" 
                                            style="background-color: #ffe4e6 !important; color: #9f1239 !important; border: 1px solid #fecdd3 !important; border-radius: 12px !important; padding: 6px 16px; font-weight: 600; font-size: 14px; box-shadow: none;">
                                               Hapus
                                        </button>
                                    </form>
                                @else
                                    {{-- Tampilan pengganti yang ramah jika Kasir yang sedang membuka halaman --}}
                                    <span class="text-muted" style="font-style: italic; font-size: 13px;">Hanya Lihat</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-5 text-muted">
                            <h5 class="m-0" style="font-style: italic;">Data jenis tidak ditemukan.</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>

@foreach($categories as $category)
<div class="modal fade" id="editJenisModal{{ $category->id }}" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(4px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 1.5rem;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" style="color: #9d174d;">
                    <span style="border-left: 5px solid #ffc107; padding-left: 8px;">Edit Jenis / Kategori</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.jenis.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body px-4">
                    <div class="mb-3 text-start">
                        <label for="nama_jenis_{{ $category->id }}" class="form-label fw-bold" style="color: #4c0519;">Nama Jenis / Kategori Produk</label>
                        <input 
                            type="text" 
                            name="nama_jenis" 
                            id="nama_jenis_{{ $category->id }}" 
                            value="{{ old('nama_jenis', $category->nama_jenis) }}"
                            class="form-control @error('nama_jenis') is-invalid @enderror" 
                            style="border-radius: 0.75rem; border: 1px solid #fbcfe8; padding: 0.6rem 1rem;"
                            required
                        >
                        @error('nama_jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light border btn-sm" data-bs-dismiss="modal" style="border-radius: 0.75rem; padding: 0.5rem 1.2rem; font-weight: 600;">Batal</button>
                    <button type="submit" class="btn btn-sm" style="margin: 0; padding: 0.5rem 1.4rem; background-color: #fce7f3; color: #9d174d; border: 1px solid #fbcfe8; border-radius: 0.75rem; font-weight: 600;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- ➕ MODAL TAMBAH DATA --}}
<div class="modal fade" id="tambahJenisModal" tabindex="-1" aria-hidden="true" style="backdrop-filter: blur(4px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 1.5rem;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold" style="color: #9d174d;">
                    <span style="border-left: 5px solid #ec4899; padding-left: 8px;">Tambah Jenis Baru</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.jenis.store') }}" method="POST">
                @csrf
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label for="nama_jenis" class="form-label fw-bold" style="color: #4c0519;">Nama Jenis / Kategori Produk</label>
                        <input 
                            type="text" 
                            name="nama_jenis" 
                            id="nama_jenis" 
                            class="form-control @error('nama_jenis') is-invalid @enderror" 
                            placeholder="Contoh: Makanan, Minuman, Coffee" 
                            style="border-radius: 0.75rem; border: 1px solid #fbcfe8; padding: 0.6rem 1rem;"
                            required
                        >
                        @error('nama_jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light border btn-sm" data-bs-dismiss="modal" style="border-radius: 0.75rem; padding: 0.5rem 1.2rem; font-weight: 600;">Batal</button>
                    <button type="submit" class="btn btn-buat btn-sm" style="margin: 0; padding: 0.5rem 1.4rem;">Simpan Jenis</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection