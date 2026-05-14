@extends('layouts.user.HeaFoot')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- <div class="relative w-full h-32 sm:h-48 md:h-64 bg-gradient-to-r from-[#1C4E80] to-[#069BC0] rounded-2xl sm:rounded-3xl mb-8 flex items-center justify-between px-4 md:px-8 shadow-md overflow-hidden group">
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
    </div> --}}

    
    <!-- Pure Tailwind & Alpine.js Carousel -->
    <div x-data="{ activeSlide: 0, slideCount: {{ count($carouselImages) }} }"
         x-init="setInterval(() => { activeSlide = activeSlide === slideCount - 1 ? 0 : activeSlide + 1 }, 3000)"
         class="relative w-full h-56 md:h-96 overflow-hidden rounded-2xl group shadow-sm mb-8 sm:mb-10">
        
        <!-- Carousel Slides -->
        <div class="flex h-full transition-transform duration-700 ease-in-out"
             :style="'transform: translateX(-' + (activeSlide * 100) + '%)'">
            @foreach($carouselImages as $banner)
                <div class="w-full h-full flex-shrink-0 relative">
                    <img src="{{ asset($banner) }}" class="w-full h-full object-cover object-center" alt="Banner Promo">
                </div>
            @endforeach
        </div>

        <!-- Slider Indicators -->
        <div class="absolute bottom-4 left-1/2 z-30 flex -translate-x-1/2 space-x-2">
            @foreach($carouselImages as $index => $banner)
                <button @click="activeSlide = {{ $index }}" 
                        class="h-2.5 rounded-full transition-all duration-300"
                        :class="activeSlide === {{ $index }} ? 'bg-[#069BC0] w-6' : 'bg-white/70 hover:bg-white w-2.5'"></button>
            @endforeach
        </div>

        <!-- Slider Controls (Prev/Next) -->
        <button @click="activeSlide = activeSlide === 0 ? slideCount - 1 : activeSlide - 1"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer focus:outline-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/20 text-white hover:bg-black/40 backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </span>
        </button>
        
        <button @click="activeSlide = activeSlide === slideCount - 1 ? 0 : activeSlide + 1"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer focus:outline-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black/20 text-white hover:bg-black/40 backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </span>
        </button>
    </div>


    <div class="mb-8 sm:mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-extrabold text-lg sm:text-xl text-slate-800 tracking-tight">Kategori Populer</h2>
            <a href="#" class="text-sm font-bold text-[#069BC0] hover:text-[#1C4E80] transition-colors">Lihat Semua</a>
        </div>
        
        <div class="flex justify-start sm:justify-center gap-4 sm:gap-6 md:gap-10 overflow-x-auto pb-4 snap-x custom-scrollbar">
            @php
                $colors = [
                    'from-red-400 to-red-600',
                    'from-amber-300 to-amber-500',
                    'from-green-400 to-green-600',
                    'from-blue-500 to-blue-700',
                    'from-fuchsia-400 to-fuchsia-600',
                    'from-slate-600 to-slate-800'
                ];
            @endphp
            @foreach($categories as $index => $kategori)
            @php
                $catName = strtolower($kategori->nama_kategori);
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>'; // Bag default

                if (str_contains($catName, 'makanan') || str_contains($catName, 'camilan')) {
                    // Utensils
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>';
                } elseif (str_contains($catName, 'minuman')) {
                    // Coffee / Cup
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/><line x1="14" y1="2" x2="14" y2="4"/></svg>';
                } elseif (str_contains($catName, 'atk') || str_contains($catName, 'alat tulis') || str_contains($catName, 'kertas')) {
                    // Pen
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>';
                } elseif (str_contains($catName, 'atribut') || str_contains($catName, 'pakaian') || str_contains($catName, 'baju')) {
                    // Shirt
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.38 3.46L16 2a8 8 0 0 0-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>';
                }
            @endphp
            <a href="{{ route('customer.allProduct', ['kategori' => $kategori->id]) }}" class="flex flex-col items-center gap-3 snap-center group cursor-pointer">
                <div class="flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br {{ $colors[$index % count($colors)] }} shadow-md group-hover:-translate-y-1.5 group-hover:shadow-lg transition-all duration-300">
                    {!! $icon !!}
                </div>
                <span class="text-xs sm:text-sm font-bold text-slate-600 group-hover:text-[#069BC0] transition-colors">{{ $kategori->nama_kategori }}</span>
            </a>
            @endforeach
        </div>
    </div>

    <div>
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-extrabold text-lg sm:text-xl text-slate-800 tracking-tight border-b-2 border-[#069BC0] inline-block pb-1">Produk Unggulan</h2>
            <a href="{{ route('customer.allProduct') }}" class="text-sm font-bold text-[#069BC0] hover:text-[#1C4E80] transition-colors hidden sm:block">Lihat Semua Produk</a>
        </div>

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
        
        <!-- Tombol Tampilkan Semua di Bagian Bawah -->
        <div class="mt-10 flex justify-center">
            <a href="{{ route('customer.allProduct') }}" class="px-8 py-3 bg-[#069BC0] text-white font-bold rounded-xl shadow-md hover:bg-[#1C4E80] hover:-translate-y-1 transition-all duration-300">Tampilkan Semua Produk</a>
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