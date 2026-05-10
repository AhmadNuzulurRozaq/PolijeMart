@extends('layouts.user.HeaFoot')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="relative w-full h-32 sm:h-48 md:h-64 bg-gradient-to-r from-[#1C4E80] to-[#069BC0] rounded-2xl sm:rounded-3xl mb-8 flex items-center justify-between px-4 md:px-8 shadow-md overflow-hidden group">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] mix-blend-overlay"></div>
        <div class="absolute -right-20 -top-40 w-96 h-96 bg-white/10 blur-3xl rounded-full"></div>
        
        <div class="absolute left-8 md:left-16 z-10 hidden sm:block">
            <h2 class="text-2xl md:text-4xl font-extrabold text-white drop-shadow-lg tracking-wide mb-2">PROMO<br>SPESIAL!</h2>
            <p class="text-blue-100 font-medium">Temukan penawaran terbaik hari ini.</p>
        </div>

        <button class="z-10 bg-black/20 hover:bg-black/40 text-white rounded-full p-2.5 backdrop-blur-sm transition-all shadow-sm group-hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <button class="z-10 bg-black/20 hover:bg-black/40 text-white rounded-full p-2.5 backdrop-blur-sm transition-all shadow-sm group-hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <div class="mb-8 sm:mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-extrabold text-lg sm:text-xl text-slate-800 tracking-tight">Kategori Populer</h2>
            <a href="#" class="text-sm font-bold text-[#069BC0] hover:text-[#1C4E80] transition-colors">Lihat Semua</a>
        </div>
        
        <div class="flex justify-start sm:justify-center gap-4 sm:gap-6 md:gap-10 overflow-x-auto pb-4 snap-x custom-scrollbar">
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-red-400 to-red-600 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Snack</span>
            </div>
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-amber-300 to-amber-500 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Minuman</span>
            </div>
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-green-400 to-green-600 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Sayuran</span>
            </div>
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Kesehatan</span>
            </div>
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-fuchsia-400 to-fuchsia-600 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Kecantikan</span>
            </div>
            <div class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-slate-600 to-slate-800 shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300"></div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">Lainnya</span>
            </div>
        </div>
    </div>

    <div>
        <h2 class="font-extrabold text-lg sm:text-xl text-slate-800 tracking-tight mb-6 border-b-2 border-[#069BC0] inline-block pb-1">Produk Unggulan</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
            @forelse ($product as $produk)
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col overflow-hidden relative">
                    
                    @if($produk->stok > 0 && $produk->stok <= 5)
                        <div class="absolute top-3 left-3 z-10 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">
                            Sisa {{ $produk->stok }}
                        </div>
                    @endif

                    <a href="{{ route('customer.detailProduct', $produk->id) }}">
                        <div class="w-full aspect-square bg-slate-50 relative p-4 flex items-center justify-center overflow-hidden">
                            <img src="{{ $produk->image ? asset('storage/' . $produk->image) : 'Tidak ada gambar' }}" alt="{{ $produk->nama_barang }}" class="max-h-full object-contain group-hover:scale-110 transition-transform duration-500 drop-shadow-md">
                        </div>
                        
                        <div class="p-4 sm:p-5 flex flex-col flex-grow bg-white">
                            <h3 class="font-bold text-sm sm:text-base text-slate-800 line-clamp-2 leading-snug mb-1 group-hover:text-[#069BC0] transition-colors">
                                {{ $produk->nama_barang }}
                            </h3>
                            <p class="text-[#069BC0] font-extrabold text-base sm:text-lg mb-2">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
                            
                            <div class="mt-auto pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-medium text-slate-500">Stok: <b class="text-slate-800">{{ $produk->stok ?? 0 }}</b></span>
                                
                                <a href="{{ route('customer.detailProduct', $produk->id) }}" class="bg-[#e0f7fa] text-[#0096c7] hover:bg-[#069BC0] hover:text-white font-bold p-2 rounded-lg transition-colors shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2zm-9.83-3.25l.03-.12l.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2l-2.76 5H8.53l-.13-.27L6.16 6l-.95-2l-.94-2H1v2h2l3.6 7.59l-1.35 2.45c-.16.28-.25.61-.25.96a2 2 0 0 0 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/></svg>
                                </a>
                            </div>
                        </div>
                    </a>
                    
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <svg class="mx-auto h-16 w-16 text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <p class="text-slate-500 font-medium text-lg">Belum ada produk yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .custom-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection