@extends('layouts.user.HeaFoot')

@section('title', 'Checkout | Polije Mart')

@section('content')

<div class="py-10">
    <div class="max-w-6xl mx-auto">
        <div class="mb-10">
            <span class="text-xs font-extrabold text-secondary-500 uppercase tracking-[0.2em] block mb-2">Proses Pembelian</span>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Checkout Produk</h1>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left: Shipping Information -->
            <div class="lg:col-span-7 space-y-6">

                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-2xl font-semibold text-sm shadow-sm flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] shadow-premium border border-slate-100">
                    <h2 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Informasi Pengambilan (Read-Only)
                    </h2>
                    
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200/60 rounded-xl text-slate-800 font-semibold outline-none text-sm cursor-not-allowed shadow-inner" readonly>
                            </div>
                            <div>
                                <label class="block text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2">Alamat E-mail</label>
                                <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200/60 rounded-xl text-slate-800 font-semibold outline-none text-sm cursor-not-allowed shadow-inner" readonly>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2">Nomor Telepon</label>
                            <input type="text" value="{{ Auth::user()->nomor_telepon }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200/60 rounded-xl text-slate-800 font-semibold outline-none text-sm cursor-not-allowed shadow-inner" readonly>
                        </div>

                        <div>
                            <label class="block text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-2">Alamat Pengiriman</label>
                            <textarea rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200/60 rounded-xl text-slate-800 font-semibold outline-none text-sm cursor-not-allowed shadow-inner resize-none" readonly>{{ Auth::user()->alamat }}</textarea>
                        </div>
                        
                        <div class="bg-blue-50/50 border border-blue-100 p-4 rounded-2xl flex items-start gap-3 mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <p class="text-xs text-slate-650 leading-relaxed font-semibold">Produk yang Anda beli akan disiapkan oleh administrator Polije Mart untuk kemudian diambil secara langsung di lokasi fisik Polije Mart.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Order Summary sticky receipt -->
            <div class="lg:col-span-5">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] shadow-premium border border-slate-100 sticky top-24">
                    <h2 class="text-xl font-black text-slate-800 mb-6 border-b border-slate-100 pb-4">Ringkasan Pesanan</h2>

                    @php
                        $biaya_layanan = 2000;
                        $total_pembayaran = $subtotal + $biaya_layanan;
                    @endphp

                    <!-- Itemized List -->
                    <div class="space-y-4 mb-6 max-h-60 overflow-y-auto custom-scrollbar pr-2">
                        @foreach($checkoutItems as $item)
                            <div class="flex items-center gap-4 py-2">
                                <div class="w-14 h-14 bg-slate-50 border border-slate-100 rounded-xl p-1 flex-shrink-0 flex items-center justify-center">
                                    <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'Tidak ada gambar' }}" alt="{{ $item['nama_barang'] }}" class="max-h-full object-contain">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-sm font-bold text-slate-800 truncate leading-snug">{{ $item['nama_barang'] }}</h3>
                                    <p class="text-xs text-slate-400 font-semibold mt-1">Jumlah: {{ $item['jumlah'] }} PCS</p>
                                </div>
                                <div class="text-sm font-black text-slate-800">
                                    Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr class="border-slate-100 mb-4">

                    <!-- Price breakdown -->
                    <div class="space-y-3.5 text-xs font-semibold text-slate-550 mb-6">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-extrabold text-slate-800">Rp {{ number_format($subtotal,0,',','.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Layanan</span>
                            <span class="font-extrabold text-slate-800">Rp {{ number_format($biaya_layanan,0,',','.') }}</span>
                        </div>
                    </div>

                    <hr class="border-slate-100 mb-5">

                    <div class="flex justify-between items-baseline mb-8">
                        <span class="text-sm font-bold text-slate-650">Total Pembayaran</span>
                        <span class="text-2xl font-black text-secondary-600 tracking-tight">Rp {{ number_format($total_pembayaran,0,',','.') }}</span>
                    </div>

                    <!-- Checkout Form -->
                    <form action="{{ route('customer.checkoutStore') }}" method="POST">
                        @csrf
                        @foreach($checkoutItems as $item)
                            <input type="hidden" name="barang_id[]" value="{{ $item['id'] }}">
                            <input type="hidden" name="jumlah[]" value="{{ $item['jumlah'] }}">
                        @endforeach
                        <input type="hidden" name="total_bayar" value="{{ $total_pembayaran }}">
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-700 to-primary-800 text-white font-black py-4 px-4 rounded-2xl shadow-lg shadow-primary-700/20 hover:from-primary-800 hover:to-primary-900 transition-all flex justify-center items-center gap-2 cursor-pointer uppercase tracking-widest text-xs">
                            Buat Pesanan Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection