@extends('layouts.user.HeaFoot')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Semua Produk</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Jelajahi seluruh koleksi produk unggulan dari Polije Mart.</p>
        
        @if(request('search'))
            <p class="text-sm text-slate-600 mt-4">Menampilkan hasil pencarian untuk: <span class="font-bold text-[#069BC0]">"{{ request('search') }}"</span></p>
        @endif
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6 mb-10">
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
                <p class="text-slate-500 font-medium text-lg">Belum ada produk yang tersedia saat ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Link Pagination -->
    @if($product->hasPages())
        <div class="p-4 rounded-xl border border-slate-100 bg-white">
            {{ $product->withQueryString()->links() }}
        </div>
    @endif

</div>
@endsection