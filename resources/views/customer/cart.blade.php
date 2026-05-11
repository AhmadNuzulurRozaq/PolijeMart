@extends('layouts.user.HeaFoot')

@section('title', 'Keranjang - Polije Mart')

@section('content')
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div x-data="cart()" class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight mb-8">Keranjang Belanja</h1>
    
    @if(session('status'))
        <div id="alert-status" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-green-800 border border-green-200 rounded-xl bg-green-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m10 16.4l-4-4L7.4 11l2.6 2.6L16.6 7L18 8.4z"/></svg>
                {{ session('status') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-status').style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
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
        <div id="alert-error" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-red-800 border border-red-200 rounded-xl bg-red-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                {{ session('error') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="text-red-600 hover:text-red-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
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
                <div class="lg:col-span-2 space-y-4">
                    <!-- Select All -->
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                        <input type="checkbox" x-model="selectAll" @change="toggleAll" class="w-5 h-5 rounded border-slate-300 text-[#1C4E80] focus:ring-[#1C4E80] cursor-pointer">
                        <span class="font-bold text-slate-700">Pilih Semua</span>
                    </div>

                    <!-- Cart Items -->
                    @foreach(session('cart') as $id => $details)
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 flex flex-col sm:flex-row items-start sm:items-center gap-4 relative">
                        <input type="checkbox" name="selected_items[]" value="{{ $id }}" x-model="selectedItems" class="absolute sm:static top-4 left-4 item-checkbox w-5 h-5 rounded border-slate-300 text-[#1C4E80] focus:ring-[#1C4E80] cursor-pointer" data-price="{{ $details['harga'] }}" data-qty="{{ $details['jumlah'] }}">
                        
                        <div class="ml-8 sm:ml-0 flex-shrink-0">
                            <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'Tidak ada gambar' }}" class="w-20 h-20 object-contain rounded-lg border border-slate-50 p-1">
                        </div>
                        
                        <div class="flex-1 w-full mt-2 sm:mt-0">
                            <h3 class="font-bold text-slate-800 line-clamp-1">{{ $details['nama_barang'] }}</h3>
                            <p class="text-[#1C4E80] font-extrabold mt-1">Rp {{ number_format($details['harga'], 0, ',', '.') }}</p>
                            <span class="text-xs font-medium text-slate-500 bg-slate-100 px-2 py-1 rounded-md mt-2 inline-block">Jumlah: {{ $details['jumlah'] }}</span>
                        </div>
                        
                        <!-- Remove button -->
                        <a href="{{ route('customer.cartRemove', $id) }}" class="absolute sm:static top-4 right-4 p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Hapus dari keranjang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M10 11v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/></svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 sticky top-24">
                        <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-3">Ringkasan Belanja</h2>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-slate-600 font-medium">Total Harga (<span x-text="selectedItems.length"></span> Produk)</span>
                            <span class="font-black text-[#1C4E80] text-xl" x-text="'Rp ' + formatRupiah(totalPrice)">Rp 0</span>
                        </div>
                        
                        <button type="submit" :disabled="selectedItems.length === 0" class="w-full bg-[#1C4E80] text-white py-3.5 rounded-xl font-bold hover:bg-[#0a233b] transition-all disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer shadow-md flex justify-center items-center gap-2">
                            Checkout Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="bg-white p-10 sm:p-16 rounded-3xl shadow-sm border border-slate-100 text-center flex flex-col items-center justify-center min-h-[400px]">
            <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-300" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-slate-700 mb-2">Keranjang Anda masih kosong</h2>
            <p class="text-slate-500 mb-8 max-w-md">Mari temukan produk menarik dan tambahkan ke keranjang belanja Anda sekarang juga!</p>
            <a href="{{ route('customer.allProduct') }}" class="inline-block bg-[#069BC0] text-white px-8 py-3 rounded-xl font-bold hover:bg-[#1C4E80] transition-all shadow-md hover:-translate-y-1">Mulai Belanja</a>
        </div>
    @endif
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