@extends('layouts.sidebar')

@section('title', 'Add Product - Polije Mart')

@section('content')

{{-- @if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<section class="mx-auto w-1/2 mt-4 mb-10">
    <form action="{{ route('admin.storeData') }}" method="POST" enctype="multipart/form-data" id="submitForm">
        @csrf
        <div class="flex flex-col gap-3 mb-3">
            <label for="kodeBarang" class="text-xl ">Kode Barang : </label>
            <input type="text" name="kode_barang" id="" value="{{ old('kode_barang') }}" required class="p-2 border-3 outline-none 
            @error('kode_barang')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">
        </div>
        @error('kode_barang')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="namaBarang" class="text-xl">Nama Produk : </label>
            <input type="text" name="nama_barang" id="" value="{{ old('nama_barang') }}" required class="p-2 border-3 outline-none 
            @error('nama_barang')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">
        </div>
        @error('nama_barang')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="deskripsiBarang" class="text-xl">Deskripsi : </label>
            <textarea name="deskripsi" id="" cols="30" rows="10" required class="p-2 border-3 outline-none 
            @error('deskripsi')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">{{ old('deskripsi') }}</textarea>
        </div>
        @error('deskripsi')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="stokBarang" class="text-xl">Stok : </label>
            <input type="number" name="stok" id="" value="{{ old('stok') }}" class="p-2 border-3 outline-none  
            @error('stok')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">
        </div>
        @error('stok')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="kategori" class="text-xl">Kategori : </label>
            <select name="kategori_id" id="" required class="p-2 border-3 outline-none  
            @error('kategori_id')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $item)
                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        @error('kategori_id')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="harga" class="text-xl">Harga : </label>
            <input type="number" name="harga" id="" value="{{ old('harga') }}" class="p-2 border-3 outline-none 
            @error('harga')
                border-red-600 hover:border-red-400 active:border-red-600 focus:border-red-500
            @else
                border-gray-300 hover:border-[#0091D5] active:border-[#0091D5] focus:border-[#0091D5]
            @enderror
            rounded-md transition-colors">
        </div>
        @error('harga')
            <p class="text-red-500 text-xs mt-1 ml-2 mb-2 font-medium">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-3 mb-3">
            <label for="gambar" class="text-xl">Gambar : </label>
            <input type="file" name="image" id="" class="p-2 border-3 outline-none  rounded-md transition-colors w-56 cursor-pointer">
        </div>
        <div class="flex justify-end gap-5 items-center">
            <div class="flex gap-3">
                <a href="{{ route('admin.inventory') }}" class="border-2 border-[#1C4E80] w-32 p-3 rounded-full text-[#202020] font-bold hover:bg-[#194674] hover:text-white active:bg-[#1C4E80] cursor-pointer transition-colors focus:outline-2 focus:outline-[#202020] focus:outline-offset-2 text-center">
                    KEMBALI
                </a>
            </div>
            <div class="flex justify-end gap-3">
                <button type="submit" class="bg-[#1C4E80] w-32 p-3 rounded-full text-white font-bold hover:bg-[#194674] active:bg-[#1C4E80] cursor-pointer transition-colors focus:outline-2 focus:outline-[#1C4E80] focus:outline-offset-2">KIRIM</button>
            </div>

        </div>
    </form>
</section>

@endsection