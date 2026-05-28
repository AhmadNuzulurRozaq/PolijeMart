@extends('layouts.user.HeaFoot')

@section('title', 'Keranjang - Polije Mart')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="cart()" class="w-full max-w-7xl mx-auto py-4 sm:py-6">
    <h1 class="text-3xl font-black text-slate-800 tracking-tight mb-8">Keranjang Belanja</h1>
    
    @if(session('status'))
        <div id="alert-status" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-green-800 border border-green-200 rounded-2xl bg-green-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                {{ session('status') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-status').style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-status');
                if (alert) {
                    alert.classList.add('opacity-0');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if(session('error'))
        <div id="alert-error" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-red-800 border border-red-200 rounded-2xl bg-red-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                {{ session('error') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="text-red-600 hover:text-red-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-error');
                if (alert) {
                    alert.classList.add('opacity-0');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if(session('cart') && count(session('cart')) > 0)
        <form action="{{ route('customer.checkoutCart') }}" method="POST" id="cartForm">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Cart Items Section -->
                <div class="lg:col-span-2 space-y-4">
                    <!-- Select All -->
                    <div class="bg-white p-5 rounded-2xl shadow-premium border border-slate-100 flex items-center gap-4">
                        <input type="checkbox" x-model="selectAll" @change="toggleAll" class="w-5 h-5 rounded border-slate-300 text-secondary-500 focus:ring-secondary-500 focus:ring-offset-0 cursor-pointer">
                        <span class="font-bold text-slate-700">Pilih Semua Produk</span>
                    </div>

                    <!-- Cart Items Loop -->
                    @foreach(session('cart') as $id => $details)
                    <div class="bg-white p-5 rounded-3xl shadow-premium border border-slate-100 flex flex-col sm:flex-row items-start sm:items-center gap-4 relative hover:border-secondary-100 transition-colors">
                        <input type="checkbox" name="selected_items[]" value="{{ $id }}" x-model="selectedItems" class="absolute sm:static top-5 left-5 item-checkbox w-5 h-5 rounded border-slate-300 text-secondary-500 focus:ring-secondary-500 focus:ring-offset-0 cursor-pointer" data-price="{{ $details['harga'] }}" data-qty="{{ $details['jumlah'] }}">
                        
                        <div class="ml-8 sm:ml-0 flex-shrink-0 bg-slate-50 rounded-2xl p-2 border border-slate-100">
                            <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'Tidak ada gambar' }}" class="w-20 h-20 object-contain rounded-lg">
                        </div>
                        
                        <div class="flex-1 w-full mt-2 sm:mt-0">
                            <h3 class="font-bold text-slate-800 line-clamp-2 leading-snug">{{ $details['nama_barang'] }}</h3>
                            <p class="text-secondary-650 font-black mt-2 text-lg">Rp {{ number_format($details['harga'], 0, ',', '.') }}</p>
                            <span class="text-[10px] font-extrabold text-slate-500 bg-slate-100 border border-slate-200/40 px-2.5 py-1 rounded-md mt-3 inline-block">Jumlah: {{ $details['jumlah'] }} PCS</span>
                        </div>
                        
                        <!-- Remove button -->
                        <a href="{{ route('customer.cartRemove', $id) }}" class="absolute sm:static top-5 right-5 p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all" title="Hapus dari keranjang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16" /></svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <!-- Order Summary Section -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 sm:p-8 rounded-[2rem] shadow-premium border border-slate-100 sticky top-24">
                        <h2 class="text-xl font-black text-slate-800 mb-6 border-b border-slate-100 pb-4">Ringkasan Belanja</h2>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-slate-550 font-bold text-sm">Total Harga (<span x-text="selectedItems.length"></span> Produk)</span>
                            <span class="font-black text-secondary-600 text-2xl tracking-tight" x-text="'Rp ' + formatRupiah(totalPrice)">Rp 0</span>
                        </div>
                        
                        <button type="submit" :disabled="selectedItems.length === 0" class="w-full bg-gradient-to-r from-primary-700 to-primary-800 text-white py-4 rounded-2xl font-black hover:from-primary-800 hover:to-primary-900 transition-all disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer shadow-lg shadow-primary-700/20 flex justify-center items-center gap-2 uppercase tracking-widest text-xs">
                            Checkout
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="bg-white p-10 sm:p-20 rounded-[2.5rem] shadow-premium border border-slate-100 text-center flex flex-col items-center justify-center min-h-[450px]">
            <div class="w-24 h-24 bg-slate-50 rounded-[1.8rem] flex items-center justify-center mb-6 border border-slate-100 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h2 class="text-2xl font-black text-slate-800 mb-2 tracking-tight">Keranjang Anda masih kosong</h2>
            <p class="text-slate-500 mb-8 max-w-md font-medium text-sm leading-relaxed">Mari temukan produk menarik dan tambahkan ke keranjang belanja Anda sekarang juga!</p>
            <a href="{{ route('customer.allProduct') }}" class="inline-block bg-gradient-to-r from-secondary-400 to-secondary-600 hover:from-secondary-500 hover:to-secondary-700 text-white px-8 py-3.5 rounded-2xl font-extrabold hover:shadow-lg transition-all shadow-md hover:-translate-y-0.5 text-sm uppercase tracking-wider">Mulai Belanja</a>
        </div>
    @endif
</div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('cart', () => ({
            selectAll: false,
            selectedItems: [],
            items: @json(session('cart', [])),
            
            get totalPrice() {
                let total = 0;
                this.selectedItems.forEach(id => {
                    if (this.items[id]) {
                        total += this.items[id].harga * this.items[id].jumlah;
                    }
                });
                return total;
            },
            
            toggleAll() {
                if (this.selectAll) {
                    this.selectedItems = Object.keys(this.items).map(String);
                } else {
                    this.selectedItems = [];
                }
            },
            
            formatRupiah(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            },

            init() {
                this.$watch('selectedItems', value => {
                    this.selectAll = value.length === Object.keys(this.items).length && value.length > 0;
                });
            }
        }))
    });
</script>
@endsection