@extends('layouts.user.HeaFoot')

@section('content')

<div class="w-full max-w-7xl mx-auto py-4 sm:py-6">

    <!-- Premium Promo Banner -->
    <div class="relative w-full overflow-hidden rounded-[2rem] shadow-premium mb-10 border border-slate-100 bg-slate-950 group">
        <a href="{{ route('customer.allProduct') }}" class="block w-full">
            <img src="{{ asset('images/banner-promo.png') }}" class="w-full h-auto object-cover object-center group-hover:scale-[1.015] transition-all duration-700" alt="Banner Promo Polije Mart">
        </a>
    </div>


    <!-- Kategori Populer -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="font-black text-xl sm:text-2xl text-slate-800 tracking-tight">Kategori Populer</h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Jelajahi produk berdasarkan kebutuhan spesifik Anda</p>
            </div>
        </div>
        
        <div class="flex justify-start sm:justify-center gap-4 sm:gap-6 md:gap-8 overflow-x-auto pb-4 snap-x custom-scrollbar">
            @php
                $colors = [
                    'from-rose-500 to-red-600 shadow-red-500/10',
                    'from-amber-400 to-orange-500 shadow-orange-500/10',
                    'from-emerald-400 to-teal-600 shadow-emerald-500/10',
                    'from-secondary-400 to-primary-600 shadow-secondary-500/10',
                    'from-fuchsia-400 to-purple-600 shadow-purple-500/10',
                    'from-slate-600 to-slate-850 shadow-slate-500/10'
                ];
            @endphp
            @foreach($categories as $index => $kategori)
            @php
                $catName = strtolower($kategori->nama_kategori);
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'; 

                if (str_contains($catName, 'makanan') || str_contains($catName, 'camilan')) {
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>';
                } elseif (str_contains($catName, 'minuman')) {
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>';
                } elseif (str_contains($catName, 'atk') || str_contains($catName, 'alat tulis') || str_contains($catName, 'kertas')) {
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>';
                } elseif (str_contains($catName, 'atribut') || str_contains($catName, 'pakaian') || str_contains($catName, 'baju')) {
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46L16 2a8 8 0 0 0-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>';
                }
            @endphp
            <a href="{{ route('customer.allProduct', ['kategori' => $kategori->id]) }}" class="flex flex-col items-center gap-3.5 snap-center group cursor-pointer">
                <div class="flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br {{ $colors[$index % count($colors)] }} text-white shadow-lg group-hover:-translate-y-2 group-hover:shadow-xl group-hover:scale-105 transition-all duration-300 border border-white/10 relative overflow-hidden">
                    <div class="absolute -right-3 -top-3 w-10 h-10 bg-white/10 rounded-full blur-md"></div>
                    <div class="relative z-10">
                        {!! $icon !!}
                    </div>
                </div>
                <span class="text-xs sm:text-sm font-extrabold text-slate-600 group-hover:text-secondary-600 transition-colors uppercase tracking-wider text-center max-w-[80px] leading-tight">{{ $kategori->nama_kategori }}</span>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Produk Unggulan -->
    <div>
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="font-black text-xl sm:text-2xl text-slate-800 tracking-tight">Produk Unggulan</h2>
                <p class="text-xs text-slate-400 font-medium mt-1">Daftar produk terbaik dengan harga mahasiswa</p>
            </div>
            <a href="{{ route('customer.allProduct') }}" class="text-sm font-bold text-secondary-600 hover:text-primary-700 transition-colors flex items-center gap-1 group hidden sm:flex">
                Lihat Semua Produk
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
            @forelse ($product as $produk)
                <div class="bg-white border border-slate-100 rounded-3xl shadow-premium hover:shadow-premium-hover transition-all duration-300 group flex flex-col overflow-hidden relative">
                    
                    @if($produk->stok > 0 && $produk->stok <= 5)
                        <div class="absolute top-4 left-4 z-10 bg-gradient-to-r from-red-500 to-rose-600 text-white text-[10px] font-black px-2.5 py-1.5 rounded-xl shadow-md uppercase tracking-wider">
                            Sisa {{ $produk->stok }} PCS
                        </div>
                    @endif

                    <a href="{{ route('customer.detailProduct', $produk->id) }}" class="flex-grow flex flex-col">
                        <div class="w-full aspect-square bg-slate-50 relative p-6 flex items-center justify-center overflow-hidden border-b border-slate-50">
                            <!-- Soft circular decoration behind image -->
                            <div class="absolute w-2/3 h-2/3 bg-slate-100 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500"></div>
                            <img src="{{ $produk->image ? asset('storage/' . $produk->image) : 'Tidak ada gambar' }}" alt="{{ $produk->nama_barang }}" class="max-h-full object-contain group-hover:scale-110 transition-transform duration-500 drop-shadow-xl relative z-10">
                        </div>
                        
                        <div class="p-4 sm:p-5 flex flex-col flex-grow bg-white">
                            <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">{{ $produk->kategori->nama_kategori ?? 'Umum' }}</span>
                            <h3 class="font-bold text-sm sm:text-base text-slate-800 line-clamp-2 leading-snug mb-2 group-hover:text-secondary-600 transition-colors">
                                {{ $produk->nama_barang }}
                            </h3>
                            <p class="text-secondary-600 font-black text-lg sm:text-xl tracking-tight mt-auto">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </p>
                            
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-slate-400">Stok: <b class="text-slate-700">{{ $produk->stok ?? 0 }}</b></span>
                                <span class="bg-secondary-50 text-secondary-600 hover:bg-secondary-600 hover:text-white font-bold p-2.5 rounded-xl transition-all shadow-sm hover:shadow-md cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-premium">
                    <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <p class="text-slate-500 font-semibold text-lg">Belum ada produk yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Tombol Tampilkan Semua di Bagian Bawah -->
        <div class="mt-12 flex justify-center">
            <a href="{{ route('customer.allProduct') }}" class="px-8 py-3.5 bg-gradient-to-r from-primary-700 to-primary-800 text-white font-extrabold rounded-2xl shadow-lg shadow-primary-700/20 hover:from-primary-800 hover:to-primary-900 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 uppercase tracking-wider text-xs">Tampilkan Semua Produk</a>
        </div>
    </div>

</div>

@endsection