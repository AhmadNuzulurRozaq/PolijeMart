<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Menampilkan semua data produk (Katalog API)
     */
    public function index()
    {
        // Ambil produk beserta relasi kategorinya
        $products = Barang::with('kategori')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar Katalog Produk Polije Mart',
            'data'    => $products
        ], 200);
    }

    /**
     * Menampilkan detail satu produk berdasarkan ID
     */
    public function show($id)
    {
        $product = Barang::with('kategori')->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Produk Ditemukan',
            'data'    => $product
        ], 200);
    }

    /**
     * Menambahkan produk baru (Create API)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $fileName = "";
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images', 'public');
        }

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'image' => $fileName,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil ditambahkan!',
            'data'    => $barang
        ], 201);
    }

    /**
     * Mengubah data produk (Update API)
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang,' . $id,
            'nama_barang' => 'required',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|numeric',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

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

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil diupdate!',
            'data'    => $barang
        ], 200);
    }

    /**
     * Menghapus data produk (Delete API)
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan!',
            ], 404);
        }

        if ($barang->image) {
            Storage::disk('public')->delete($barang->image);
        }
        
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil dihapus!'
        ], 200);
    }
}
