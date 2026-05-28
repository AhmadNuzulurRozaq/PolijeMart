@extends('layouts.sidebar')

@section('title', 'Add Product - Polije Mart')

@section('content')

<section class="max-w-4xl mx-auto px-2 sm:px-6 py-6 fade-in-up">
    <!-- Header Form -->
    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Tambah Produk Baru</h1>
        <p class="text-sm text-slate-500 mt-1.5 font-semibold flex items-center gap-1">
            <span class="inline-block w-2 h-2 bg-secondary-500 rounded-full animate-pulse"></span>
            <span>Lengkapi form di bawah untuk mendaftarkan barang baru ke inventori.</span>
        </p>
    </div>

    <!-- Form Container -->
    <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-premium border border-slate-100">
        <form action="{{ route('admin.storeData') }}" method="POST" enctype="multipart/form-data" id="submitForm">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode Barang -->
                <div class="flex flex-col gap-2">
                    <label for="kodeBarang" class="text-xs font-black text-slate-700 uppercase tracking-wider">Kode Barang <span class="text-rose-500">*</span></label>
                    <input type="text" name="kode_barang" id="kodeBarang" value="{{ old('kode_barang') }}" required maxlength="10" placeholder="Contoh: BRG-001" 
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                    @error('kode_barang')
                        border-red-500 focus:border-rose-500
                    @else
                        border-slate-200 focus:border-secondary-500 hover:border-slate-350
                    @enderror">
                    @error('kode_barang')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="flex flex-col gap-2">
                    <label for="kategori" class="text-xs font-black text-slate-700 uppercase tracking-wider">Kategori Produk <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <select name="kategori_id" id="kategori" required 
                        class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-850 cursor-pointer appearance-none focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                        @error('kategori_id')
                            border-red-500 focus:border-rose-500
                        @else
                            border-slate-200 focus:border-secondary-500 hover:border-slate-350
                        @enderror">
                            <option value="" disabled {{ old('kategori_id') ? '' : 'selected' }}>Pilih Kategori Produk</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-slate-400">
                            <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    @error('kategori_id')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Nama Barang -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="namaBarang" class="text-xs font-black text-slate-700 uppercase tracking-wider">Nama Produk <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama_barang" id="namaBarang" value="{{ old('nama_barang') }}" required placeholder="Masukkan nama produk lengkap..." 
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                    @error('nama_barang')
                        border-red-500 focus:border-rose-500
                    @else
                        border-slate-200 focus:border-secondary-500 hover:border-slate-350
                    @enderror">
                    @error('nama_barang')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="deskripsiBarang" class="text-xs font-black text-slate-700 uppercase tracking-wider">Deskripsi Produk <span class="text-rose-500">*</span></label>
                    <textarea name="deskripsi" id="deskripsiBarang" cols="30" rows="4" required placeholder="Tuliskan spesifikasi lengkap, varian rasa/ukuran, atau detail informasi barang lainnya secara jelas..." 
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 resize-y focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                    @error('deskripsi')
                        border-red-500 focus:border-rose-500
                    @else
                        border-slate-200 focus:border-secondary-500 hover:border-slate-350
                    @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="flex flex-col gap-2">
                    <label for="stokBarang" class="text-xs font-black text-slate-700 uppercase tracking-wider">Jumlah Stok Awal <span class="text-rose-500">*</span></label>
                    <input type="number" name="stok" id="stokBarang" value="{{ old('stok', 1) }}" required min="1" placeholder="1" 
                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                    onpaste="if(!/^[0-9]+$/.test(event.clipboardData.getData('text'))) event.preventDefault();"
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                    @error('stok')
                        border-red-500 focus:border-rose-500
                    @else
                        border-slate-200 focus:border-secondary-500 hover:border-slate-350
                    @enderror">
                    @error('stok')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="flex flex-col gap-2">
                    <label for="harga" class="text-xs font-black text-slate-700 uppercase tracking-wider">Harga Jual Jual (Rp) <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-450 font-bold text-sm">
                            <span>Rp</span>
                        </div>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required min="0" placeholder="0" 
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        onpaste="if(!/^[0-9]+$/.test(event.clipboardData.getData('text'))) event.preventDefault();"
                        class="w-full pl-10 p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                        @error('harga')
                            border-red-500 focus:border-rose-500
                        @else
                            border-slate-200 focus:border-secondary-500 hover:border-slate-350
                        @enderror">
                    </div>
                    @error('harga')
                        <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="flex flex-col gap-2 md:col-span-2">
                    <label for="gambar" class="text-xs font-black text-slate-700 uppercase tracking-wider">Foto Produk</label>
                    <div class="mt-1 flex justify-center px-6 pt-6 pb-6 border-2 border-slate-250 border-dashed rounded-2xl bg-slate-50/50 hover:bg-slate-50 transition-colors">
                        <div class="space-y-1.5 text-center" id="upload-placeholder">
                            <div class="p-3 bg-white shadow-sm border border-slate-200/50 rounded-2xl w-fit mx-auto text-slate-450">
                                <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex text-sm text-slate-650 justify-center mt-2.5 font-bold">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-lg text-secondary-600 hover:text-secondary-750 focus-within:outline-none px-2.5 py-1 border border-slate-200/80 shadow-sm active:scale-95 transition-all">
                                    <span>Upload gambar</span>
                                    <input id="file-upload" name="image" type="file" class="sr-only" onchange="previewImage(event)" accept="image/*">
                                </label>
                                <p class="pl-1.5 pt-1 text-slate-450 font-semibold">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-slate-400 font-semibold">Mendukung format PNG, JPG, GIF hingga maksimal 2MB</p>
                        </div>

                        <!-- Image Preview Slot -->
                        <div id="image-preview-container" class="hidden flex-col items-center justify-center w-full">
                            <div class="p-2.5 bg-white border border-slate-200 rounded-2xl shadow-premium relative group max-h-56">
                                <img id="image-preview" src="" alt="Preview Gambar" class="max-h-48 object-contain rounded-xl shadow-inner">
                            </div>
                            <label for="file-upload" class="cursor-pointer mt-4 bg-white rounded-xl font-bold text-xs uppercase tracking-wider text-slate-600 hover:text-rose-500 px-4 py-2 shadow-sm border border-slate-200/80 transition-all hover:shadow active:scale-95">
                                Ganti Gambar
                            </label>
                        </div>
                    </div>
                    @error('image')
                        <p class="text-red-600 text-xs font-bold mt-1 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>
            </div>

            <hr class="border-slate-100 my-8">

            <!-- Action Buttons -->
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4 items-center">
                <a href="{{ route('admin.inventory') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl text-slate-600 bg-slate-100 font-extrabold hover:bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 text-center cursor-pointer tracking-wider text-xs uppercase">
                    KEMBALI
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-white bg-gradient-to-r from-secondary-700 to-secondary-500 font-extrabold hover:brightness-105 shadow-md shadow-secondary-500/20 active:scale-[0.98] transition-all focus:outline-none focus:ring-2 focus:ring-secondary-500/30 cursor-pointer tracking-wider text-xs uppercase">
                    SIMPAN PRODUK
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    function previewImage(event) {
        const input = event.target;
        const placeholder = document.getElementById('upload-placeholder');
        const previewContainer = document.getElementById('image-preview-container');
        const previewImage = document.getElementById('image-preview');

        // Mengecek apakah ada file yang diunggah
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                placeholder.classList.add('hidden'); // Sembunyikan ikon upload
                previewContainer.classList.remove('hidden'); // Tampilkan div preview
                previewContainer.classList.add('flex');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            previewImage.src = "";
            placeholder.classList.remove('hidden');
            previewContainer.classList.add('hidden');
            previewContainer.classList.remove('flex');
        }
    }
</script>

@endsection