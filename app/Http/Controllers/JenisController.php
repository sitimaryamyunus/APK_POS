<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data dari tabel roles sebagai perumpamaan Jenis/Kategori produk Anda
        $keyword = $request->input('search');

        if ($keyword) {
            $categories = Role::where('name', 'like', '%' . $keyword . '%')
                ->paginate(10)
                ->withQueryString();
        } else {
            $categories = Role::query()->paginate(10)->withQueryString();
        }

        return view('jenis.index', compact('categories'));
    }
}
