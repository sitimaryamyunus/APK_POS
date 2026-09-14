<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    // Menampilkan daftar jenis produk
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        
        $categories = Jenis::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama_jenis', 'like', '%' . $keyword . '%');
            })
            ->orderBy('nama_jenis')
            ->paginate(10)
            ->withQueryString();

        return view('jenis.index', compact('categories'));
    }

    // Menyimpan jenis produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis,nama_jenis'
        ]);

        Jenis::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk baru berhasil ditambahkan!');
    }

    // Menghapus data jenis dari database
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis,nama_jenis,' . $id
        ]);

        $jenis = Jenis::findOrFail($id);
        
        $jenis->update([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk berhasil diperbarui!');
    }
}
