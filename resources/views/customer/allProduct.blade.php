@extends('layouts.user.HeaFoot')

@section('content')
<div class="w-full max-w-7xl mx-auto py-4 sm:py-6">

    <div class="mb-10">
        <span class="text-xs font-extrabold text-secondary-500 uppercase tracking-[0.2em] block mb-2">Katalog Polije Mart</span>
        <h1 class="text-3xl sm:text-4xl font-black text-slate-800 tracking-tight">Semua Produk</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Jelajahi seluruh koleksi produk unggulan dari Polije Mart dengan harga terbaik.</p>
        
        @if(request('search'))
            <div class="mt-4 flex items-center gap-2 bg-slate-100 border border-slate-200/60 px-4 py-2 rounded-xl w-fit">
                <span class="text-xs font-semibold text-slate-500">Hasil pencarian untuk:</span>
                <span class="text-xs font-extrabold text-secondary-600 bg-white border border-secondary-100 px-2 py-0.5 rounded-md">"{{ request('search') }}"</span>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6 mb-12">
        @forelse ($product as $produk)
            <div class="bg-white border border-slate-100 rounded-3xl shadow-premium transition-all duration-350 group flex flex-col overflow-hidden relative {{ $produk->stok == 0 ? 'opacity-60 grayscale cursor-not-allowed' : 'hover:shadow-premium-hover' }}">
                
                @if($produk->stok > 0 && $produk->stok <= 5)
                    <div class="absolute top-4 left-4 z-10 bg-gradient-to-r from-red-500 to-rose-600 text-white text-[10px] font-black px-2.5 py-1.5 rounded-xl shadow-md uppercase tracking-wider">
                        Sisa {{ $produk->stok }} PCS
                    </div>
                @endif

                @if($produk->stok == 0)
                    <div class="absolute top-4 left-4 z-10 bg-gradient-to-r from-slate-600 to-slate-800 text-white text-[10px] font-black px-2.5 py-1.5 rounded-xl shadow-md uppercase tracking-wider">
                        Habis
                    </div>
                @endif

                <a href="{{ $produk->stok == 0 ? 'javascript:void(0)' : route('customer.detailProduct', $produk->id) }}" class="{{ $produk->stok == 0 ? 'pointer-events-none' : '' }} flex-grow flex flex-col">
                    <div class="w-full aspect-square bg-slate-50 relative p-6 flex items-center justify-center overflow-hidden border-b border-slate-50">
                        <div class="absolute w-2/3 h-2/3 bg-slate-100 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500"></div>
                        <img src="{{ $produk->image ? asset('storage/' . $produk->image) : 'Tidak ada gambar' }}" alt="{{ $produk->nama_barang }}" class="max-h-full object-contain {{ $produk->stok == 0 ? '' : 'group-hover:scale-110' }} transition-transform duration-500 drop-shadow-xl relative z-10">
                    </div>
                    
                    <div class="p-4 sm:p-5 flex flex-col flex-grow bg-white">
                        <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">{{ $produk->kategori->nama_kategori ?? 'Umum' }}</span>
                        <h3 class="font-bold text-sm sm:text-base text-slate-800 line-clamp-2 leading-snug mb-2 {{ $produk->stok == 0 ? '' : 'group-hover:text-secondary-600' }} transition-colors">
                            {{ $produk->nama_barang }}
                        </h3>
                        <p class="text-secondary-600 font-black text-lg sm:text-xl tracking-tight mt-auto">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                        
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-400">Stok: <b class="text-slate-700">{{ $produk->stok ?? 0 }}</b></span>
                            
                            @if($produk->stok > 0)
                            <span class="bg-secondary-50 text-secondary-600 hover:bg-secondary-600 hover:text-white font-bold p-2.5 rounded-xl transition-all shadow-sm hover:shadow-md cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </span>
                            @else
                            <button type="button" class="bg-slate-100 text-slate-400 font-bold p-2.5 rounded-xl transition-colors shadow-none pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            </button>
                            @endif
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
                <p class="text-slate-500 font-semibold text-lg">Belum ada produk yang cocok dengan pencarian Anda.</p>
            </div>
        @endforelse
    </div>

    <!-- Link Pagination -->
    @if($product->hasPages())
        <div class="p-4 rounded-2xl border border-slate-100 bg-white shadow-premium">
            {{ $product->withQueryString()->links() }}
        </div>
    @endif

</div>
@endsection