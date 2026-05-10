<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Penjualan;
use App\Models\Detail_penjualan;
use App\Models\Barang;
use App\Models\Kategori;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $product = Barang::all();
        return view('customer.index', compact(['product']));
    }

    public function detailProduct($id)
    {

        $product = Barang::findOrFail($id);
        return view('customer.detail', compact('product'));
    }

    public function manageProduct()
    {

        $orders = Penjualan::with(['detail_penjualans.barang'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('customer.manage', compact('orders'));
    }

    public function cartProduct()
    {
        return view('customer.cart');
    }

    public function checkoutProduct($id)
    {
        $product = Barang::findOrFail($id);
        return view('customer.checkout', compact('product'));
    }

    public function checkoutStore(Request $request)
    {

        DB::beginTransaction();

        try {
            $penjualan = Penjualan::create([
                'user_id' => Auth::id(),
                'tanggal_penjualan' => now(),
                'total_bayar' => $request->total_bayar,
                'status' => 'proses',
                'batas_waktu' => now(),

            ]);

            Detail_penjualan::create([
                'penjualan_id' => $penjualan->id,
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'harga' => Barang::findOrFail($request->barang_id)->harga,
                'subtotal' => $request->total_bayar - 2000,
            ]);

            DB::commit();
            return redirect()->route('customer.manageProduct')->with('status', 'Pesanan Berhasil di Proses');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
