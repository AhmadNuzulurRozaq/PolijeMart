@extends('layouts.user.HeaFoot')

@section('title', 'Detail Produk - Polije Mart')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="w-full" x-data="{ openModal: false, openModalCart: false, jumlah: 1 }">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12 flex flex-col md:flex-row items-center md:items-start gap-8 lg:gap-16">
        
        <div class="w-full md:w-1/2 flex justify-center order-1">
            <div class="bg-white p-6 sm:p-10 rounded-[1.5rem] lg:rounded-[2rem] shadow-sm border border-slate-100 flex justify-center items-center w-full max-w-md relative group">
                <div class="absolute inset-0 bg-[#1C4E80]/5 rounded-[1.5rem] lg:rounded-[2rem] scale-90 group-hover:scale-95 transition-transform duration-500"></div>
                
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" 
                     alt="{{ $product->nama_barang }}" 
                     class="w-full max-h-[300px] object-contain drop-shadow-xl transition-transform duration-500 group-hover:scale-110 relative z-10">
            </div>
        </div>

        <div class="w-full md:w-1/2 flex flex-col text-slate-800 order-2">
            
            <h1 class="text-2xl lg:text-4xl font-extrabold uppercase tracking-tight leading-tight mb-2 text-slate-800">
                {{ $product->nama_barang }}
            </h1>
            
            <div class="flex items-end gap-2 text-[#1C4E80] mb-6 mt-2">
                <span class="text-xl lg:text-2xl font-bold mb-1">Rp</span>
                <span class="text-4xl lg:text-5xl font-black tracking-tighter">{{ number_format($product->harga, 0, ',', '.') }}</span>
            </div>

            <div class="mb-8 flex items-center gap-6 bg-white border border-slate-100 p-4 rounded-2xl shadow-sm inline-flex w-fit">
                <div class="px-2 text-center">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Stok Tersedia</p>
                    <p class="text-2xl font-black text-[#1C4E80]">{{ $product->stok }} <span class="text-xs font-semibold text-slate-500">PCS</span></p>
                </div>
                <div class="h-10 w-[2px] bg-slate-100 rounded-full"></div>
                <div class="px-2 text-center">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kategori</p>
                    <p class="text-sm font-bold text-[#1C4E80] bg-blue-50 px-3 py-1 rounded-lg mt-1">{{ $product->kategori->nama_kategori }}</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mb-8 w-full xl:w-4/5">
                <button @click="openModal = true" 
                        class="flex-1 bg-[#1C4E80] text-white py-3.5 rounded-xl font-bold text-base shadow-lg shadow-[#1C4E80]/30 hover:bg-[#0a233b] hover:-translate-y-1 transition-all uppercase tracking-wide cursor-pointer">
                    Beli Sekarang
                </button>
                <button @click="openModalCart = true" 
                        class="flex-1 border-2 border-[#1C4E80] bg-white text-[#1C4E80] py-3.5 rounded-xl font-bold text-base hover:bg-blue-200 transition-all uppercase flex items-center justify-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2zm-9.83-3.25l.03-.12l.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4h-.01l-1.1 2l-2.76 5H8.53l-.13-.27L6.16 6l-.95-2l-.94-2H1v2h2l3.6 7.59l-1.35 2.45c-.16.28-.25.61-.25.96a2 2 0 0 0 2 2h12v-2H7.42c-.13 0-.25-.11-.25-.25z"/></svg>
                    Keranjang
                </button>
            </div>

            <div class="bg-blue-50/50 p-6 rounded-[1.5rem] border border-blue-100/50 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-2 h-full bg-[#1C4E80] rounded-l-full"></div>
                <h3 class="text-xs font-black uppercase tracking-[0.2em] text-[#1C4E80] mb-3">Deskripsi Produk</h3>
                <p class="text-slate-600 leading-relaxed text-base font-medium">
                     {{ $product->deskripsi }}
                </p>
            </div>
        </div>
    </div>

    {{-- OPEN MODAL CHECHKOUT --}}
    <div x-show="openModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 backdrop-blur-none"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 backdrop-blur-none"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex justify-center items-center z-[100] p-4"
         style="display: none;">
        
        <div @click.away="openModal = false" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-xl p-6 lg:p-10 shadow-2xl w-full max-w-xl flex flex-col sm:flex-row gap-6 sm:gap-10 items-center relative">
            
            <button @click="openModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>

            <div class="w-full sm:w-1/3 bg-slate-50 rounded-2xl p-4 border border-slate-100 flex flex-col items-center">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" class="h-24 sm:h-32 mx-auto drop-shadow-md mb-3 object-contain">
                <p class="font-bold text-slate-800 text-center text-sm">{{ $product->nama_barang }}</p>
                <p class="text-[#1C4E80] font-extrabold text-sm">{{ number_format($product->harga, 0, ',', '.') }}</p>
            </div>

            <div class="w-full sm:w-2/3 flex flex-col justify-center">
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Atur Jumlah</h2>
                <p class="text-sm text-slate-500 mb-6 font-medium">Tentukan jumlah barang yang ingin dibeli.</p>
                
                <div class="flex items-center gap-4 mb-8">
                    <button @click="if(jumlah > 1) jumlah--" class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-800 text-xl font-bold flex items-center justify-center transition-colors shadow-sm cursor-pointer">&minus;</button>
                    
                    <input type="number" x-model.number="jumlah" min="1" max="50"
                           class="w-20 bg-white border-2 border-slate-200 rounded-xl py-3 text-center text-2xl font-black text-[#1C4E80] outline-none focus:border-[#1C4E80] transition-colors appearance-none m-0">
                    
                    <button @click="jumlah++" class="w-12 h-12 rounded-xl bg-[#1C4E80] hover:bg-[#113253] text-white text-xl font-bold flex items-center justify-center transition-colors shadow-sm cursor-pointer">&#43;</button>
                </div>

                <div class="flex gap-3">
                    <button @click="openModal = false" class="flex-1 border border-slate-200 bg-white hover:bg-slate-200 text-slate-500 py-3 rounded-xl font-bold text-sm uppercase transition-colors cursor-pointer ">
                        Batal
                    </button>
                    <button @click="window.location.href = '{{ route('customer.checkoutProduct', $product->id) }}?jumlah=' + jumlah" 
                            class="flex-[2] bg-[#1C4E80] text-white py-3 rounded-xl font-extrabold text-sm uppercase tracking-wide shadow-md hover:bg-[#0a233b] hover:-translate-y-0.5 transition-all cursor-pointer">
                        Checkout Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- OPEN MODAL CART --}}
    <div x-show="openModalCart" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 backdrop-blur-none"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0 backdrop-blur-none"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex justify-center items-center z-[100] p-4"
         style="display: none;">
        
        <div @click.away="openModalCart = false" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-xl p-6 lg:p-10 shadow-2xl w-full max-w-xl flex flex-col sm:flex-row gap-6 sm:gap-10 items-center relative">
            
            <button @click="openModalCart = false" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>

            <div class="w-full sm:w-1/3 bg-slate-50 rounded-2xl p-4 border border-slate-100 flex flex-col items-center">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" class="h-24 sm:h-32 mx-auto drop-shadow-md mb-3 object-contain">
                <p class="font-bold text-slate-800 text-center text-sm">{{ $product->nama_barang }}</p>
                <p class="text-[#1C4E80] font-extrabold text-sm">{{ number_format($product->harga, 0, ',', '.') }}</p>
            </div>

            <div class="w-full sm:w-2/3 flex flex-col justify-center">
                <h2 class="text-2xl font-extrabold text-slate-800 mb-2">Atur Jumlah</h2>
                <p class="text-sm text-slate-500 mb-6 font-medium">Tentukan jumlah barang yang ingin dibeli.</p>
                
                <div class="flex items-center gap-4 mb-8">
                    <button @click="if(jumlah > 1) jumlah--" class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-800 text-xl font-bold flex items-center justify-center transition-colors shadow-sm cursor-pointer">&minus;</button>
                    
                    <input type="number" x-model.number="jumlah" min="1" max="50"
                           class="w-20 bg-white border-2 border-slate-200 rounded-xl py-3 text-center text-2xl font-black text-[#1C4E80] outline-none focus:border-[#1C4E80] transition-colors appearance-none m-0">
                    
                    <button @click="jumlah++" class="w-12 h-12 rounded-xl bg-[#1C4E80] hover:bg-[#113253] text-white text-xl font-bold flex items-center justify-center transition-colors shadow-sm cursor-pointer">&#43;</button>
                </div>

                <div class="flex gap-3">
                    <button @click="openModalCart = false" class="flex-1 border border-slate-200 bg-white hover:bg-slate-200 text-slate-500 py-3 rounded-xl font-bold text-sm uppercase transition-colors cursor-pointer">
                        Batal
                    </button>
                    <form action="{{ route('customer.cartAdd', $product->id) }}" method="POST" class="flex-[2]">
                        @csrf
                        <input type="hidden" name="jumlah" :value="jumlah">
                        <button type="submit" class="w-full bg-[#1C4E80] text-white py-3 rounded-xl font-extrabold text-sm uppercase tracking-wide shadow-md hover:bg-[#0a233b] hover:-translate-y-0.5 transition-all cursor-pointer">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Menghilangkan panah atas-bawah pada input number di modal */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection