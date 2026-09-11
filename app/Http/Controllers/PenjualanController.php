<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');

        $sales = Penjualan::query()
            ->with(['user', 'itemPenjualan.produk'])

            // 🔒 Filter berdasarkan role
            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            // 🔍 Search nama user
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'like', '%' . $keyword . '%');
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('penjualan.index', compact('sales'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sale = Penjualan::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'OPEN'
            ],
            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH'
            ]
        );

        $keyword = $request->input('search');

        if ($keyword) {
            $products = Produk::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
                ->orderBy('nama')
                ->get();
        } else {
            $products = Produk::orderBy('nama')->get();
        }

        $mode = 'create';

        return view('penjualan.pos', compact('sale', 'products', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        abort_if($sale->status === 'COMPLETED', 403);

        $sale->load('itemPenjualan');
        $products = Produk::orderBy('nama')->get();
        $mode = 'edit';

        return view('penjualan.pos', compact('sale', 'products', 'mode'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        // 🔄 Hitung ulang total asli dari keranjang terlebih dahulu
        $total = $penjualan->itemPenjualan()->sum('subtotal');

        $request->validate([
            'payment_method' => 'required|in:CASH,QRIS',
            'uang_dibayar'   => 'required|numeric|min:' . $total // Validasi nominal uang harus cukup
        ], [
            'uang_dibayar.required' => 'Nominal uang dibayar wajib diisi.',
            'uang_dibayar.min'      => 'Uang yang dibayarkan kurang dari total pembayaran.'
        ]);

        if ($penjualan->status !== 'OPEN') {
            return back()->with('errors', 'Transaksi sudah diproses');
        }

        if ($penjualan->itemPenjualan()->count() === 0) {
            return back()->with('errors', 'Keranjang masih kosong');
        }

        DB::transaction(function () use ($penjualan, $request, $total) {
            $penjualan->update([
                'metode_pembayaran' => $request->payment_method,
                'total_pembayaran'  => $total,
                'uang_dibayar'      => $request->uang_dibayar, // 💾 Menyimpan uang dibayar ke DB
                'status'            => 'COMPLETED'
            ]);
        });

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Transaksi berhasil diselesaikan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $this->authorize('delete', $penjualan);

        // 🔒 Validasi opsional: Jika selain admin tidak boleh menghapus transaksi kasir lain
        if (Auth::user()->role->name !== 'admin' && $penjualan->user_id !== Auth::id()) {
            return redirect()->route('penjualan.index')->with('errors', 'Anda tidak berhak menghapus transaksi ini');
        }

        DB::transaction(function () use ($penjualan) {

            foreach ($penjualan->itemPenjualan as $item) {
                // 🔼 Kembalikan stok ke gudang secara otomatis saat transaksi dihapus
                if ($item->produk) {
                    $item->produk->increment('stok', $item->kuantitas);
                }
            }

            // ❌ Hapus item relasi keranjang
            $penjualan->itemPenjualan()->delete();

            // ❌ Hapus data induk penjualan
            $penjualan->delete();
        });

        return redirect()
            ->route('penjualan.index')
            ->with('success', 'Transaksi berhasil dihapus dan stok dikembalikan');
    }
}
