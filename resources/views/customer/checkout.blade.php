@extends('layouts.user.HeaFoot')

@section('title', 'Checkout | Polije Mart')

@section('content')

<div class="min-h-screen bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 mb-8">CHECKOUT PRODUCT</h1>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-8 space-y-6">
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pengiriman (ReadOnly)</h2>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" value="{{ Auth::user()->name }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors" readonly>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                            <input type="text" value="{{ Auth::user()->nomor_telepon }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors" placeholder="08xxxxxxxxxx" readonly>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman Lengkap</label>
                            <textarea rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors" placeholder="Masukkan alamat lengkap RT/RW, Desa, Kecamatan" readonly>{{ Auth::user()->alamat }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h2>

                    @php
                        $jumlah = request('jumlah',1);
                        $subtotal = $product->harga * $jumlah;
                        $biaya_layanan = 2000;
                        $total_pembayaran = $subtotal + $biaya_layanan;
                    @endphp

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gray-100 rounded-md overflow-hidden flex-shrink-0">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'Tidak ada gambar' }}" alt="{{ $product->nama_barang }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-800 line-clamp-1">{{ $product->nama_barang }}</h3>
                                <p class="text-xs text-gray-500 mt-1">Jumlah: {{ $jumlah }}</p>
                            </div>
                            <div class="text-sm font-semibold text-gray-800">
                                Rp {{ number_format($product->harga,0, ',', '.') }}
                            </div>
                        </div>

                    <hr class="border-gray-100 mb-4">

                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-800">Rp {{ number_format($subtotal,0,',','.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Layanan</span>
                            <span class="font-medium text-gray-800">Rp {{ number_format($biaya_layanan,0,',','.') }}</span>
                        </div>
                    </div>

                    <hr class="border-gray-100 mb-4">

                    <div class="flex justify-between items-center mb-6">
                        <span class="text-base font-semibold text-gray-800">Total Pembayaran</span>
                        <span class="text-lg font-bold text-indigo-600">{{ number_format($total_pembayaran,0,',','.') }}</span>
                    </div>

                    <form action="{{ route('customer.chekoutStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="barang_id" value="{{ $product->id }}">
                        <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                        <input type="hidden" name="total_pembayaran" value="{{ $total_pembayaran }}">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors flex justify-center items-center gap-2">
                            Buat Pesanan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection