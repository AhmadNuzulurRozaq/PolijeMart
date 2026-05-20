<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Penjualan;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderStatusMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total = Barang::count();
        $order = Penjualan::count();
        $category = Kategori::count();
        $totalStok = Barang::sum('stok');
        return view('admin.dashboard', compact(['total', 'order', 'category', 'totalStok']));
    }

    public function inventory()
    {
        return view('admin.inventory');
    }

    public function addData()
    {
        $kategori = Kategori::get();
        return view('admin.addData', compact(['kategori']));
    }

    public function storeData(Request $request)
    {
        // dd('Pengujian Javascript');
        $request->validate([
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
        ]);

        $fileName = "";
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images', 'public');
        }

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.inventory')->with('status', 'Data barang berhasil ditambahkan!');
    }

    public function showData($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        return response()->json($barang);
    }

    public function editData($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::get();
        return view('admin.editData', compact(['barang', 'kategori']));
    }

    public function updateData(Request $request, $id)
    {
        // dd('Pengujian Javascript');
        $request->validate([
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang,' . $id,
            'nama_barang' => 'required',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
        ]);

        $barang = Barang::findOrFail($id);
        $fileName = $barang->image;

        if ($request->hasFile('image')) {
            if ($barang->image) {
                Storage::disk('public')->delete($barang->image);
            }
            $fileName = $request->file('image')->store('images', 'public');
        }

        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'image' => $fileName,
        ]);

        return redirect()->route('admin.inventory')->with('status', 'Data berhasil di update !');
    }

    public function destroyData($id)
    {

        $barang = Barang::findOrFail($id);
        if ($barang->image) {
            Storage::disk('public')->delete($barang->image);
        }
        $barang->delete();
        return redirect()->route('admin.inventory')->with('status', 'Data berhasil dihapus!');
    }

    // CONTROLLER UNTUK MENAMBAH KATEGORI
    public function manageCategory()
    {
        return view('admin.category.category');
    }

    public function addCategory()
    {
        return view('admin.category.addCategory');
    }

    public function storeCategory(Request $request)
    {
        // dd('Pengujian Javascript');
        $request->validate([
            'kode_kategori' => 'required|string|unique:kategoris,kode_kategori',
            'nama_kategori' => 'required|string|unique:kategoris,nama_kategori',
        ]);

        Kategori::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.manageCategory')->with('status', 'Kategori berhasil ditambahkan');
    }

    public function editCategory($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.category.editCategory', compact(['kategori']));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'kode_kategori' => 'required|string|unique:kategoris,kode_kategori,' . $id,
            'nama_kategori' => 'required|string|unique:kategoris,nama_kategori,' . $id,
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.manageCategory')->with('status', 'Kategori berhasil diupdate');
    }

    public function destroyCategory($id)
    {
        $kategori = Kategori::findOrFail($id);

        // Cek apakah ada barang yang menggunakan kategori ini
        $barangTerkait = Barang::where('kategori_id', $id)->count();
        if ($barangTerkait > 0) {
            return redirect()->route('admin.manageCategory')->with('error', "Gagal dihapus! Terdapat $barangTerkait barang yang masih menggunakan kategori ini.");
        }

        $kategori->delete();
        return redirect()->route('admin.manageCategory')->with('status', 'Kategori berhasil dihapus!');
    }

    public function manageOrder()
    {

        return view('admin.orders.order');
    }

    public function completeOrder($id)
    {

        DB::beginTransaction();

        try {
            $penjualan = Penjualan::with(['detail_penjualans', 'user'])->findOrFail($id);

            $penjualan->update([
                'status' => 'selesai',
                'batas_waktu' => now()->addHour(24),
            ]);

            foreach ($penjualan->detail_penjualans as $detail) {
                $barang = Barang::findOrFail($detail->barang_id);

                if ($barang->stok < $detail->jumlah) {
                    throw new Exception('Stok barang tidak mencukupi !');
                }

                $barang->decrement('stok', $detail->jumlah);
            }

            DB::commit();

            if ($penjualan->user && $penjualan->user->email) {
                Mail::to($penjualan->user->email)->send(new OrderStatusMail($penjualan, 'selesai'));
            }
            return redirect()->back()->with('status', 'Pesanan berhasil diambil & Email berhasil di kirim !');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
    }
}
