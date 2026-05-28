@extends('layouts.user.HeaFoot')

@section('title', 'Detail Produk - Polije Mart')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="w-full" x-data="{ 
openModal: false, 
openModalCart: false, 
jumlah: 1,
formatInput(e){
    e.target.value = e.target.value.replace(/[^0-9]/g, '');
    if(e.target.value === '0' || e.target.value === ''){
        this.jumlah = 1;
    }
},

antiPaste(e){
    let pasteData = (e.clipboardData || e.window.clipboardData).getData('text');
    if(/[^0-9]/.test(pasteData)) {
        e.preventDefault();
        Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Hanya angka yang diizinkan untuk jumlah barang!',
                confirmButtonColor: '#1C4E80'
        });
    }
}
 }">
    
    <div class="max-w-7xl mx-auto py-8 sm:py-12 flex flex-col md:flex-row items-center md:items-start gap-8 lg:gap-16">
        
        <!-- Left: Product Image Card -->
        <div class="w-full md:w-1/2 flex justify-center order-1">
            <div class="bg-white p-6 sm:p-10 rounded-[2rem] shadow-premium border border-slate-100/80 flex justify-center items-center w-full max-w-md relative group overflow-hidden">
                <div class="absolute inset-4 bg-gradient-to-tr from-secondary-50 to-primary-50 rounded-[1.5rem] opacity-75 group-hover:scale-105 transition-transform duration-500"></div>
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" 
                     alt="{{ $product->nama_barang }}" 
                     class="w-full max-h-[350px] object-contain drop-shadow-2xl transition-transform duration-500 group-hover:scale-110 relative z-10">
            </div>
        </div>

        <!-- Right: Product Information -->
        <div class="w-full md:w-1/2 flex flex-col text-slate-800 order-2">
            <div class="mb-4">
                <span class="text-xs font-black text-secondary-500 uppercase tracking-[0.2em] bg-secondary-50 px-3 py-1.5 rounded-lg border border-secondary-100/50 inline-block">{{ $product->kategori->nama_kategori }}</span>
            </div>
            
            <h1 class="text-3xl lg:text-4xl font-black text-slate-800 leading-tight mb-4 tracking-tight">
                {{ $product->nama_barang }}
            </h1>
            
            <div class="flex items-baseline gap-2 text-secondary-600 mb-8 mt-2">
                <span class="text-xl lg:text-2xl font-extrabold">Rp</span>
                <span class="text-4xl lg:text-5xl font-black tracking-tighter">{{ number_format($product->harga, 0, ',', '.') }}</span>
            </div>

            <!-- Stats Badge Grid -->
            <div class="mb-8 grid grid-cols-2 gap-4 max-w-md">
                <div class="bg-white border border-slate-100 p-4 rounded-2xl shadow-premium">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Stok Tersedia</p>
                    <p class="text-2xl font-black text-primary-700">{{ $product->stok }} <span class="text-xs font-bold text-slate-400">PCS</span></p>
                </div>
                <div class="bg-white border border-slate-100 p-4 rounded-2xl shadow-premium">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kode Produk</p>
                    <p class="text-sm font-extrabold text-slate-700 bg-slate-50 border border-slate-200/40 px-3 py-1.5 rounded-lg inline-block mt-1 font-mono uppercase">{{ $product->kode_barang }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mb-8 w-full xl:w-4/5">
                <button @click="openModal = true" 
                        class="flex-1 bg-gradient-to-r from-primary-700 to-primary-800 text-white py-4 rounded-2xl font-extrabold text-base shadow-lg shadow-primary-700/20 hover:from-primary-800 hover:to-primary-900 hover:-translate-y-1 hover:shadow-xl transition-all uppercase tracking-wider cursor-pointer">
                    Beli Sekarang
                </button>
                <button @click="openModalCart = true" 
                        class="flex-1 border-2 border-slate-200 bg-white text-slate-700 py-4 rounded-2xl font-extrabold text-base hover:border-primary-700 hover:text-primary-700 hover:bg-slate-50 transition-all uppercase flex items-center justify-center gap-2 cursor-pointer shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    Keranjang
                </button>
            </div>

            <!-- Description Card -->
            <div class="bg-slate-50 border border-slate-100 p-6 sm:p-8 rounded-[2rem] relative overflow-hidden">
                <div class="absolute top-0 left-0 w-2 h-full bg-gradient-to-b from-secondary-400 to-secondary-600 rounded-l-full"></div>
                <h3 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Deskripsi Lengkap</h3>
                <p class="text-slate-650 leading-relaxed text-base font-semibold">
                     {{ $product->deskripsi }}
                </p>
            </div>
        </div>
    </div>

    {{-- OPEN MODAL CHECKOUT --}}
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
             class="bg-white rounded-3xl p-6 lg:p-10 shadow-2xl w-full max-w-xl flex flex-col sm:flex-row gap-6 sm:gap-10 items-center relative border border-slate-100">
            
            <button @click="openModal = false" class="absolute top-5 right-5 text-slate-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="w-full sm:w-1/3 bg-slate-50 rounded-2xl p-4 border border-slate-100 flex flex-col items-center shadow-inner">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" class="h-28 mx-auto drop-shadow-xl mb-3 object-contain">
                <p class="font-bold text-slate-800 text-center text-xs line-clamp-2 leading-tight mb-2">{{ $product->nama_barang }}</p>
                <p class="text-secondary-650 font-black text-sm">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            </div>

            <div class="w-full sm:w-2/3 flex flex-col justify-center">
                <h2 class="text-2xl font-black text-slate-800 mb-1 tracking-tight">Atur Jumlah</h2>
                <p class="text-xs text-slate-400 mb-6 font-semibold">Tentukan kuantitas pesanan Anda di bawah ini</p>
                
                <div class="flex items-center gap-4 mb-8">
                    <button @click="if(jumlah > 1) jumlah--" class="w-12 h-12 rounded-xl bg-slate-150 hover:bg-slate-200 text-slate-700 text-2xl font-black flex items-center justify-center transition-all shadow-sm cursor-pointer border border-slate-200/50">&minus;</button>
                    
                    <input type="number" x-model.number="jumlah" min="1" max="50" @input="formatInput($event)" @paste="antiPaste($event)"
                           class="w-24 bg-slate-50 border-2 border-slate-200 rounded-xl py-2.5 text-center text-2xl font-black text-primary-700 outline-none focus:border-secondary-500 focus:bg-white transition-colors appearance-none m-0 shadow-inner">
                    
                    <button @click="jumlah++" class="w-12 h-12 rounded-xl bg-gradient-to-r from-secondary-400 to-secondary-600 hover:from-secondary-500 hover:to-secondary-700 text-white text-2xl font-black flex items-center justify-center transition-all shadow-md cursor-pointer">&#43;</button>
                </div>

                <div class="flex gap-3">
                    <button @click="openModal = false" class="flex-1 border border-slate-200 bg-white hover:bg-slate-50 text-slate-500 py-3.5 rounded-2xl font-extrabold text-xs uppercase tracking-wider transition-colors cursor-pointer">
                        Batal
                    </button>
                    <button @click="window.location.href = '{{ route('customer.checkoutProduct', $product->id) }}?jumlah=' + jumlah" 
                            class="flex-[2] bg-gradient-to-r from-primary-700 to-primary-800 text-white py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-primary-700/20 hover:from-primary-800 hover:to-primary-900 hover:-translate-y-0.5 transition-all cursor-pointer text-center">
                        Checkout
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
             class="bg-white rounded-3xl p-6 lg:p-10 shadow-2xl w-full max-w-xl flex flex-col sm:flex-row gap-6 sm:gap-10 items-center relative border border-slate-100">
            
            <button @click="openModalCart = false" class="absolute top-5 right-5 text-slate-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="w-full sm:w-1/3 bg-slate-50 rounded-2xl p-4 border border-slate-100 flex flex-col items-center shadow-inner">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" class="h-28 mx-auto drop-shadow-xl mb-3 object-contain">
                <p class="font-bold text-slate-800 text-center text-xs line-clamp-2 leading-tight mb-2">{{ $product->nama_barang }}</p>
                <p class="text-secondary-650 font-black text-sm">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            </div>

            <div class="w-full sm:w-2/3 flex flex-col justify-center">
                <h2 class="text-2xl font-black text-slate-800 mb-1 tracking-tight">Tambah Keranjang</h2>
                <p class="text-xs text-slate-400 mb-6 font-semibold">Tentukan jumlah barang yang ingin ditambahkan</p>
                
                <div class="flex items-center gap-4 mb-8">
                    <button @click="if(jumlah > 1) jumlah--" class="w-12 h-12 rounded-xl bg-slate-150 hover:bg-slate-200 text-slate-700 text-2xl font-black flex items-center justify-center transition-all shadow-sm cursor-pointer border border-slate-200/50">&minus;</button>
                    
                    <input type="number" x-model.number="jumlah" min="1" max="50" @input="formatInput($event)" @paste="antiPaste($event)"
                           class="w-24 bg-slate-50 border-2 border-slate-200 rounded-xl py-2.5 text-center text-2xl font-black text-primary-700 outline-none focus:border-secondary-500 focus:bg-white transition-colors appearance-none m-0 shadow-inner">
                    
                    <button @click="jumlah++" class="w-12 h-12 rounded-xl bg-gradient-to-r from-secondary-400 to-secondary-600 hover:from-secondary-500 hover:to-secondary-700 text-white text-2xl font-black flex items-center justify-center transition-all shadow-md cursor-pointer">&#43;</button>
                </div>

                <div class="flex gap-3">
                    <button @click="openModalCart = false" class="flex-1 border border-slate-200 bg-white hover:bg-slate-50 text-slate-500 py-3.5 rounded-2xl font-extrabold text-xs uppercase tracking-wider transition-colors cursor-pointer">
                        Batal
                    </button>
                    <form action="{{ route('customer.cartAdd', $product->id) }}" method="POST" class="flex-[2]">
                        @csrf
                        <input type="hidden" name="jumlah" :value="jumlah">
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-700 to-primary-800 text-white py-3.5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-primary-700/20 hover:from-primary-800 hover:to-primary-900 hover:-translate-y-0.5 transition-all cursor-pointer">
                            Tambah
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

<!-- Menampilkan pesan error -->
@if(session('error'))
<script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            if (typeof window.Swal !== 'undefined') {
                window.Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#1C4E80'
                });
            } else {
                alert('Gagal!\n{{ session('error') }}');
            }
        }, 100);
    });
</script>
@endif

<!-- Menampilkan pesan sukses -->
@if(session('status'))
<script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            if (typeof window.Swal !== 'undefined') {
                window.Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                    confirmButtonColor: '#1C4E80'
                });
            } else {
                alert('Berhasil!\n{{ session('status') }}');
            }
        }, 100);
    });
</script>
@endif
@endsection