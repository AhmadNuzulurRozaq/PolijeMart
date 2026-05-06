@extends('layouts.sidebar')

@section('title', 'Add Product - Polije Mart')

@section('content')

<section class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
    <!-- Header Form -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Tambah Produk Baru</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Lengkapi form di bawah ini untuk menambahkan barang ke dalam inventory.</p>
    </div>

    <!-- Form Container -->
    <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-sm border border-slate-100">
        <form action="{{ route('admin.storeData') }}" method="POST" enctype="multipart/form-data" id="submitForm">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode Barang -->
                <div class="flex flex-col gap-2">
                    <label for="kodeBarang" class="text-sm font-bold text-slate-700">Kode Barang <span class="text-red-500">*</span></label>
                    <input type="text" name="kode_barang" id="kodeBarang" value="{{ old('kode_barang') }}" required placeholder="Contoh: BRG-001" 
                    class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                    @error('kode_barang')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
                    @error('kode_barang')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16t-.288-.712T12 15t-.712.288T11 16t.288.713T12 17m0-4q.425 0 .713-.288T13 12V8q0-.425-.288-.712T12 7t-.712.288T11 8v4q0 .425.288.713T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="flex flex-col gap-2">
                    <label for="kategori" class="text-sm font-bold text-slate-700">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori_id" id="kategori" required 
                    class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white cursor-pointer
                    @error('kategori_id')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
                        <option value="" disabled {{ old('kategori_id') ? '' : 'selected' }}>Pilih Kategori Produk</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16t-.288-.712T12 15t-.712.288T11 16t.288.713T12 17m0-4q.425 0 .713-.288T13 12V8q0-.425-.288-.712T12 7t-.712.288T11 8v4q0 .425.288.713T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Nama Barang -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="namaBarang" class="text-sm font-bold text-slate-700">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_barang" id="namaBarang" value="{{ old('nama_barang') }}" required placeholder="Masukkan nama produk..." 
                    class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                    @error('nama_barang')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
                    @error('nama_barang')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="deskripsiBarang" class="text-sm font-bold text-slate-700">Deskripsi Produk <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" id="deskripsiBarang" cols="30" rows="4" required placeholder="Tuliskan deskripsi lengkap produk..." 
                    class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white resize-y
                    @error('deskripsi')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="flex flex-col gap-2">
                    <label for="stokBarang" class="text-sm font-bold text-slate-700">Stok Tersedia <span class="text-red-500">*</span></label>
                    <input type="number" name="stok" id="stokBarang" value="{{ old('stok') }}" required min="0" placeholder="0" 
                    class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                    @error('stok')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
                    @error('stok')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="flex flex-col gap-2">
                    <label for="harga" class="text-sm font-bold text-slate-700">Harga (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-slate-500 font-medium">Rp</span>
                        </div>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required min="0" placeholder="0" 
                        class="w-full pl-10 p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                        @error('harga')
                            border-red-500 focus:ring-2 focus:ring-red-200
                        @else
                            border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                        @enderror">
                    </div>
                    @error('harga')
                        <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="gambar" class="text-sm font-bold text-slate-700">Gambar Produk</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl bg-slate-50 hover:bg-slate-100 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-slate-600 justify-center mt-2">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-[#1C4E80] hover:text-[#143a60] focus-within:outline-none px-2 py-1 shadow-sm border border-slate-200">
                                    <span>Upload file</span>
                                    <input id="file-upload" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1 pt-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-slate-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr class="border-slate-100 my-8">

            <!-- Action Buttons -->
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4 items-center">
                <a href="{{ route('admin.inventory') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl text-slate-700 bg-slate-100 font-bold hover:bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 text-center cursor-pointer">
                    KEMBALI
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-xl text-white bg-[#1C4E80] font-bold hover:bg-[#143a60] active:bg-[#0f2c4a] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50">
                    SIMPAN PRODUK
                </button>
            </div>
        </form>
    </div>
</section>

@endsection