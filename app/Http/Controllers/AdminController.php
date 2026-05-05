<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total = Barang::count();
        return view('admin.dashboard', compact(['total']));
    }

    public function inventory()
    {

        // $search = $request->input('search');
        // $barang = Barang::when($search, function ($query, $search) {
        //     $query->where('kode_barang', 'like', '%' . $search . '%')
        //         ->orWhere('nama_barang', 'like', '%' . $search . '%');
        // })->with('kategori')->paginate(10);

        // $total = Barang::count();
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
            'kode_barang' => 'required',
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
        // $barang = Barang::find($id);
        // if($barang){
        //     $kategori = Kategori::get();
        //     return view('admin.editData', compact(['barang', 'kategori']));
        // } else{
        //     return "Barang dengan $id tidak ditemukan";
        // }
    }

    public function updateData(Request $request, $id)
    {
        // dd('Pengujian Javascript');
        $request->validate([
            'kode_barang' => 'required',
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

        // $search = $request->input('search');

        // $kategori = Kategori::when($search, function ($query, $search) {
        //     $query->where('nama_kategori', 'like', '%' . $search . '%');
        // })->paginate(10);

        // $total = Kategori::count();
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
            'nama_kategori' => 'required|string',
        ]);

        Kategori::create([
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
            'nama_kategori' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.manageCategory')->with('status', 'Kategori berhasil diupdate');
    }

    public function destroyCategory($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('admin.inventory')->with('status', 'Kategori berhasil dihapus!');
    }

    public function manageOrder()
    {
        $order = Penjualan::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.order', compact('order'));
    }

    public function completeOrder($id){
        
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->update([
            'status' => 'selesai',
        ]);

        return redirect()->back()->with('status', 'Status pesanan berhasil diambil');
    }
}
