@extends('layouts.user.HeaFoot')

@section('title', 'Detail Produk - Polije Mart')

@section('content')
<div class="bg-transparent w-full min-h-screen flex justify-center" x-data="{ openModal: false, jumlah: 1 }">
    
    <div class="w-full max-w-6xl px-6 py-12 lg:py-20 flex flex-col md:flex-row items-center md:items-start gap-12 lg:gap-20">
        
        <div class="w-full md:w-1/2 flex justify-center">
            <div class="bg-white p-8 lg:p-12 rounded-[2.5rem] shadow-sm border border-slate-50 flex justify-center items-center w-full max-w-[450px]">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Tux.png" 
                     alt="Boneka Linux" 
                     class="w-full drop-shadow-xl transition-transform duration-500 hover:scale-105">
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col text-slate-800">
            {{-- Bagian Judul & Harga (Tetap menyatu dengan background) --}}
            <h1 class="text-4xl lg:text-6xl font-extrabold uppercase tracking-tight leading-tight mb-2">
                BONEKA LINUX <br> <span class="text-slate-800 font-normal">( TUX )</span>
            </h1>
            
            <div class="flex items-baseline gap-2 text-[#000000] mb-8">
                <span class="text-xl lg:text-2xl font-semibold">Rp</span>
                <span class="text-4xl lg:text-5xl font-black tracking-tighter">200.000</span>
            </div>

            <div class="mb-10 flex items-center gap-6">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Stok</p>
                    <p class="text-2xl font-black text-slate-700">50 <span class="text-xs font-medium text-slate-400">PCS</span></p>
                </div>
                <div class="h-8 w-px bg-slate-200"></div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kategori</p>
                    <p class="text-sm font-bold text-slate-700">Merchandise</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mb-12">
                <button @click="openModal = true" 
                        class="bg-[#00B4FF] text-white px-12 py-4 rounded-2xl font-bold text-lg shadow-lg shadow-cyan-100 hover:brightness-110 transition-all uppercase tracking-wide">
                    Beli Sekarang
                </button>
                <button @click="openModal = true" 
                        class="border-2 border-slate-100 bg-white/50 text-slate-500 px-10 py-4 rounded-2xl font-bold text-lg hover:bg-white transition-all uppercase">
                    + Keranjang
                </button>
            </div>

            <div class="bg-white p-6 lg:p-8 rounded-[2rem] shadow-sm border border-slate-50 relative overflow-hidden">
                {{-- Aksen Biru Kecil di Pojok --}}
                <div class="absolute top-0 left-0 w-2 h-full bg-[#00B4FF]/20"></div>
                
                <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Deskripsi Produk</h3>
                <p class="text-slate-500 leading-relaxed text-base lg:text-lg font-normal">
                    Hadirkan ikon legendaris dunia IT ke meja kerjamu. Boneka Tux ini dibuat dengan bahan <span class="text-slate-800 font-semibold underline decoration-[#00B4FF]/30">velboa premium</span> yang sangat lembut. Sangat cocok untuk koleksi pribadi maupun hadiah bagi pecinta open source.
                </p>
            </div>
        </div>
    </div>

    {{-- MODAL (Tetap sama seperti sebelumnya) --}}
    <div x-show="openModal" 
         x-transition.opacity
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex justify-center items-center z-[999] p-4"
         style="display: none;">
        
        <div @click.away="openModal = false" 
             class="bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-2xl w-full max-w-2xl flex flex-col md:flex-row gap-10 items-center">
            
            <div class="w-full md:w-1/3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Tux.png" class="h-32 lg:h-44 mx-auto drop-shadow-xl">
            </div>

            <div class="w-full md:w-2/3">
                <h2 class="text-3xl font-black text-slate-800 mb-6 italic">ORDER</h2>
                <div class="flex items-center gap-4 mb-8">
                    <input type="number" x-model.number="jumlah" min="1"
                           class="w-full bg-slate-50 border-none rounded-xl py-4 px-6 text-2xl font-black text-slate-800 outline-none">
                    <div class="flex gap-2">
                        <button @click="if(jumlah > 1) jumlah--" class="w-12 h-12 rounded-xl bg-slate-100 text-xl font-bold">&minus;</button>
                        <button @click="jumlah++" class="w-12 h-12 rounded-xl bg-slate-800 text-white text-xl font-bold">&#43;</button>
                    </div>
                </div>
                <div class="flex gap-4">
    <button @click="openModal = false" class="flex-1 font-bold text-slate-400 uppercase text-sm">
        Batal
    </button>
    
    {{-- Tombol Konfirmasi diarahkan ke route cart --}}
    <button @click="window.location.href = '/customer/cart'" 
            class="flex-[2] bg-[#00B4FF] text-white py-4 rounded-xl font-black text-lg uppercase tracking-widest shadow-md hover:brightness-110 transition-all">
        Konfirmasi
    </button>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>