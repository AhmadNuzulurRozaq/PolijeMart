@extends('layouts.sidebar')

@section('title', 'Edit Category - Polije Mart')

@section('content')

<section class="max-w-2xl mx-auto px-2 sm:px-6 py-8 fade-in-up">
    <!-- Header Form -->
    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Edit Kategori</h1>
        <p class="text-sm text-slate-500 mt-1.5 font-semibold flex items-center gap-1">
            <span class="inline-block w-2 h-2 bg-secondary-500 rounded-full animate-pulse"></span>
            <span>Perbarui data kategori produk inventori di bawah ini.</span>
        </p>
    </div>

    <!-- Form Container -->
    <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-premium border border-slate-100">
        <form action="{{ route('admin.updateCategory', $kategori->id) }}" method="POST" id="submitForm" class="space-y-6">
            @csrf
            @method('put')
            
            <!-- Kode Kategori -->
            <div class="flex flex-col gap-2">
                <label for="kodeKategori" class="text-xs font-black text-slate-700 uppercase tracking-wider">Kode Kategori <span class="text-rose-500">*</span></label>
                <input type="text" name="kode_kategori" id="kodeKategori" value="{{ old('kode_kategori', $kategori->kode_kategori) }}" required placeholder="Masukkan kode kategori (misal: KTG-01)..."
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                        @error('kode_kategori')
                            border-red-500 focus:border-red-500
                        @else
                            border-slate-200 focus:border-secondary-500 hover:border-slate-350
                        @enderror">
                @error('kode_kategori')
                <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ $message }}</span>
                </p>
                @enderror
            </div>

            <!-- Nama Kategori -->
            <div class="flex flex-col gap-2">
                <label for="namaKategori" class="text-xs font-black text-slate-700 uppercase tracking-wider">Nama Kategori <span class="text-rose-500">*</span></label>
                <input type="text" name="nama_kategori" id="namaKategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required placeholder="Masukkan nama kategori baru..."
                    class="w-full p-3.5 bg-slate-50/50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 placeholder-slate-400 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
                        @error('nama_kategori')
                            border-red-500 focus:border-red-500
                        @else
                            border-slate-200 focus:border-secondary-500 hover:border-slate-350
                        @enderror">
                @error('nama_kategori')
                <p class="text-red-600 text-xs font-bold flex items-center gap-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ $message }}</span>
                </p>
                @enderror
            </div>

            <hr class="border-slate-100 my-4">

            <!-- Action Buttons -->
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4 items-center">
                <a href="{{ route('admin.manageCategory') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl text-slate-650 bg-slate-100 font-extrabold hover:bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 text-center cursor-pointer tracking-wider text-xs uppercase">
                    KEMBALI
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 rounded-xl text-white bg-gradient-to-r from-secondary-700 to-secondary-500 font-extrabold hover:brightness-105 shadow-md shadow-secondary-500/20 active:scale-[0.98] transition-all focus:outline-none focus:ring-2 focus:ring-secondary-500/30 cursor-pointer tracking-wider text-xs uppercase">
                    UPDATE KATEGORI
                </button>
            </div>
        </form>
    </div>
</section>

@endsection