@extends('layouts.sidebar')

@section('title', 'Add Category - Polije Mart')

@section('content')

<section class="mx-auto w-1/2 mt-4 mb-10">
    <form action="{{ route('admin.storeCategory') }}" method="POST" id="submitForm">
        @csrf
        <div class="flex flex-col gap-2 md:col-span-2">
            <label for="kodeKategori" class="text-sm font-bold text-slate-700">Kode Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="kode_kategori" id="kodeKategori" value="{{ old('kode_kategori') }}" required placeholder="Masukkan kode kategori..."
                class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                    @error('kode_kategori')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
            @error('kode_kategori')
            <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col gap-2 md:col-span-2">
            <label for="namaKategori" class="text-sm font-bold text-slate-700">Nama Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="nama_kategori" id="namaKategori" value="{{ old('nama_kategori') }}" required placeholder="Masukkan nama kategori..."
                class="w-full p-3 bg-slate-50 border outline-none rounded-xl transition-all duration-300 focus:bg-white
                    @error('nama_kategori')
                        border-red-500 focus:ring-2 focus:ring-red-200
                    @else
                        border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50
                    @enderror">
            @error('nama_kategori')
            <p class="text-red-500 text-xs font-semibold flex items-center gap-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-5 items-center mt-10">
            <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4 items-center">
                <a href="{{ route('admin.manageCategory') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl text-slate-700 bg-slate-100 font-bold hover:bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 text-center cursor-pointer">
                    KEMBALI
                </a>
                <button type="submit" class="w-full sm:w-auto px-8 py-3 rounded-xl text-white bg-[#1C4E80] font-bold hover:bg-[#143a60] active:bg-[#0f2c4a] shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50 cursor-pointer">
                    SIMPAN KATEGORI
                </button>
            </div>
        </div>
    </form>
</section>

@endsection