@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<style>
    body {
        background: linear-gradient(135deg, #fce7f3 0%, #fae8ff 50%, #f3e8ff 100%) !important;
        min-height: 100vh;
    }

    .users-wrap {
        max-width: 1200px;
    }

    .users-section {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 1.75rem;
        padding: 1.75rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    .users-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .users-header h1 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #9d174d;
        letter-spacing: -0.4px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .users-header h1::before {
        content: "";
        width: 6px;
        height: 1.05rem;
        border-radius: 4px;
        background: linear-gradient(180deg, #f472b6, #db2777);
        display: inline-block;
    }

    /* Tombol Tambah */
    .btn-tambah {
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

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(236, 72, 153, 0.35);
        color: #fff;
    }

    /* Formulir Pencarian */
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

    .table tbody td {
        padding: 0.8rem 0.75rem;
        color: #4c0519;
        font-weight: 500;
        font-size: 0.9rem;
        vertical-align: middle;
        border: none;
    }

    .table .text-muted {
        color: #f472b6 !important;
    }

    /* Badge Peran */
    .badge-peran {
        display: inline-block;
        padding: 0.3rem 0.75rem;
        border-radius: 0.6rem;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: capitalize;
    }

    .badge-peran.admin {
        background: rgba(236, 72, 153, 0.15);
        color: #be185d;
    }

    .badge-peran.kasir {
        background: rgba(167, 139, 250, 0.15);
        color: #6d28d9;
    }

    .badge-peran.kosong {
        background: rgba(244, 114, 182, 0.1);
        color: #f472b6;
        font-style: italic;
        font-weight: 500;
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

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 1.25rem;
    }

    .pagination-wrapper p {
        display: none;
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
        .users-section {
            padding: 1.25rem;
        }
    }
</style>

<div class="container users-wrap mt-4">
    <div class="users-section">

        @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; padding: 15px 20px; margin-bottom: 20px; border-radius: 8px; font-size: 15px; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <div class="users-header">
            <h1>Halaman Pengguna</h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn-tambah">Tambah Pengguna</a>
        </div>

        <form action="{{ route('admin.users.index') }}" method="GET" class="search-form">
            <div class="input-group" style="max-width: 400px;">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control search-box-custom"
                    placeholder="Cari nama pengguna atau email"
                >
                <button class="btn btn-cari-custom" type="submit">
                    Cari
                </button>
            </div>
        </form>

        <div class="table-card">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px;">#</th>
                        <th scope="col" class="text-start">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Peran</th>
                        <th scope="col" style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td class="text-start" style="font-weight: 600;">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role?->name)
                                    <span class="badge-peran {{ $user->role->name }}">
                                        {{ $user->role->name }}
                                    </span>
                                @else
                                    <span class="badge-peran kosong">Belum diatur</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit-akun btn-sm">
                                        Edit Akun
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-hapus btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus user ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <h5 class="m-0" style="font-style: italic;">Data pengguna tidak tersedia.</h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper">
            {{ $users->links() }}
        </div>

    </div>
</div>

@endsection
