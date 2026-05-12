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
        // Mengambil 10 produk terbaru untuk halaman utama
        $product = Barang::latest()->take(10)->get();
        return view('customer.index', compact(['product']));
    }

    public function allProduct(Request $request)
    {
        $query = Barang::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_barang', 'like', '%' . $request->search . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        // Menampilkan seluruh produk dengan pagination (15 item per halaman)
        $product = $query->latest()->paginate(15);
        return view('customer.allProduct', compact(['product']));
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

    public function cartAdd(Request $request, $id)
    {
        $product = Barang::findOrFail($id);
        $cart = session()->get('cart', []);
        $jumlah = $request->jumlah ?? 1;

        // Cek apakah jumlah yang dimasukkan melebihi sisa stok yang ada
        $currentCartJumlah = isset($cart[$id]) ? $cart[$id]['jumlah'] : 0;
        if (($currentCartJumlah + $jumlah) > $product->stok) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi! Sisa stok: ' . $product->stok);
        }

        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] += $jumlah;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'nama_barang' => $product->nama_barang,
                'harga' => $product->harga,
                'image' => $product->image,
                'jumlah' => $jumlah,
                'stok' => $product->stok
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('customer.cartProduct')->with('status', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function cartRemove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('status', 'Produk dihapus dari keranjang.');
    }

    public function checkoutProduct(Request $request, $id)
    {
        $product = Barang::findOrFail($id);
        $jumlah = $request->jumlah ?? 1;

        if ($jumlah > $product->stok) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi! Sisa stok: ' . $product->stok);
        }

        $checkoutItems = [
            [
                'id' => $product->id,
                'nama_barang' => $product->nama_barang,
                'harga' => $product->harga,
                'image' => $product->image,
                'jumlah' => $jumlah
            ]
        ];
        $subtotal = $product->harga * $jumlah;

        return view('customer.checkout', compact('checkoutItems', 'subtotal'));
    }

    public function checkoutCart(Request $request)
    {
        $selectedItems = $request->selected_items; // Array id barang yang di ceklis
        if (!$selectedItems) {
            return redirect()->back()->with('error', 'Pilih minimal satu produk untuk di-checkout.');
        }

        $cart = session()->get('cart', []);
        $checkoutItems = [];
        $subtotal = 0;

        foreach ($selectedItems as $id) {
            if (isset($cart[$id])) {
                $product = Barang::findOrFail($id);
                if ($cart[$id]['jumlah'] > $product->stok) {
                    return redirect()->back()->with('error', 'Stok produk ' . $product->nama_barang . ' tidak mencukupi! Sisa stok: ' . $product->stok);
                }

                $checkoutItems[] = $cart[$id];
                $subtotal += $cart[$id]['harga'] * $cart[$id]['jumlah'];
            }
        }

        return view('customer.checkout', compact('checkoutItems', 'subtotal'));
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

            $barang_ids = $request->barang_id; // Merupakan array karena checkout bisa multi-item
            $jumlahs = $request->jumlah;

            foreach ($barang_ids as $index => $barang_id) {
                $barang = Barang::findOrFail($barang_id);
                $qty = $jumlahs[$index];
                $sub = $barang->harga * $qty;

                if ($qty > $barang->stok) {
                    throw new Exception('Stok produk ' . $barang->nama_barang . ' tidak mencukupi! Sisa stok: ' . $barang->stok);
                }

                Detail_penjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $barang_id,
                    'jumlah' => $qty,
                    'harga' => $barang->harga,
                    'subtotal' => $sub,
                ]);

                // Hapus produk tersebut dari keranjang session setelah sukses dibeli
                $cart = session()->get('cart', []);
                if (isset($cart[$barang_id])) {
                    unset($cart[$barang_id]);
                    session()->put('cart', $cart);
                }
            }

            DB::commit();
            return redirect()->route('customer.manageProduct')->with('status', 'Pesanan Berhasil di Proses');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
