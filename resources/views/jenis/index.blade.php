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
        -webkit-backdrop-filter: blur(8px);
        box-shadow: 0 10px 30px rgba(219, 39, 119, 0.03);
    }

    .jenis-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .jenis-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
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
        font-weight: 500;
        transition: all 0.25s ease;
    }

    .search-box-custom:focus {
        border-color: #ec4899 !important;
        box-shadow: 0 0 0 4px rgba(236, 72, 153, 0.15) !important;
        background: #fff;
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

    .table-card {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 25px rgba(219, 39, 119, 0.05);
    }

    .table thead tr {
        background: rgba(251, 207, 232, 0.55) !important;
    }

    .table thead th {
        border: none;
        font-weight: 700;
        font-size: 0.78rem;
        text-transform: uppercase;
        color: #9d174d !important;
        padding: 0.9rem 0.75rem;
    }

    .table tbody tr {
        border-bottom: 1px solid rgba(251, 207, 232, 0.25);
        background-color: #fff !important;
    }

    .table tbody td {
        padding: 0.8rem 0.75rem;
        color: #4c0519;
        font-weight: 500;
        font-size: 0.9rem;
    }
</style>

<div class="container jenis-wrap py-4">
    <div class="jenis-section">

        <div class="jenis-header">
            <h1>Halaman Jenis Produk</h1>
        </div>

        <form action="{{ route('admin.jenis.index') }}" method="GET" class="mb-4">
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
            <table class="table align-middle text-center m-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">No</th>
                        <th class="text-start">Nama Jenis / Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $cat)
                    <tr>
                        <td>{{ $categories->firstItem() + $index }}</td>
                        <td class="text-start fw-bold" style="color: #be185d;">{{ ucfirst($cat->name) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center py-4 text-muted">Data jenis tidak ditemukan.</td>
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
@endsection
