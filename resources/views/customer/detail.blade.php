@extends('layouts.user.HeaFoot')

@section('title', 'Detail Produk - Polije Mart')

@section('content')
{{-- Container Utama dengan background abu-abu yang memenuhi layar --}}
<div class="bg-[#94a3b8] min-h-screen w-full flex justify-center py-10 px-4 lg:px-8" x-data="{ openModal: false, jumlah: 1 }">
    
    {{-- Card Putih --}}
    <div class="bg-white rounded-[2.5rem] p-6 lg:p-12 shadow-2xl w-full max-w-[1300px] flex flex-col md:flex-row gap-8 lg:gap-12 border border-gray-100 self-start">
        
        {{-- Sisi Kiri: Foto Barang --}}
        <div class="w-full md:w-[45%] bg-[#f3f4f6] rounded-[2rem] flex justify-center items-center p-6 lg:p-12">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Tux.png" alt="Boneka Linux" class="w-full max-w-[380px] drop-shadow-2xl object-contain">
        </div>

        {{-- Sisi Kanan: Info Produk --}}
        <div class="w-full md:w-[55%] flex flex-col justify-center py-2">
            <h1 class="text-3xl lg:text-5xl font-bold text-black leading-tight uppercase tracking-tight">BONEKA LINUX ( TUX )</h1>
            <p class="text-2xl lg:text-4xl font-semibold text-black mt-1">Rp 200.000</p>
            
            <div class="border-t-2 border-gray-100 my-6 w-full lg:w-4/5"></div>

            <p class="text-xl lg:text-2xl font-medium mb-8 text-gray-700">Stok : <span class="font-bold text-black">50</span></p>

            {{-- Tombol Aksi --}}
            <div class="flex flex-wrap gap-4 mb-10">
                <button @click="openModal = true" class="bg-[#00B4FF] text-white px-10 lg:px-14 py-2.5 rounded-full font-bold text-lg lg:text-xl shadow-lg hover:brightness-110 transition uppercase">
                    BELI
                </button>
                <button @click="openModal = true" class="border-2 border-[#00B4FF] text-[#00B4FF] px-8 lg:px-12 py-2.5 rounded-full font-bold text-lg lg:text-xl hover:bg-cyan-50 transition uppercase">
                    KERANJANG
                </button>
            </div>

            {{-- Box Deskripsi --}}
            <div class="border border-gray-200 rounded-[1.5rem] p-6 lg:p-8 text-gray-600 text-sm lg:text-base leading-relaxed bg-gray-50/40 shadow-sm">
                <h3 class="font-bold uppercase mb-3 text-gray-800 tracking-wider">DESKRIPSI PRODUK</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porta nibh sed efficitur porta. Maecenas molestie enim sit amet nunc hendrerit porta. Nulla sed mollis enim, nec eleifend urna. Cras luctus orci ut imperdiet dignissim.</p>
            </div>
        </div>
    </div>

    {{-- MODAL (Pop-up) --}}
    <div x-show="openModal" 
         x-transition.opacity
         class="fixed inset-0 bg-black/60 backdrop-blur-sm flex justify-center items-center z-[999] p-4"
         style="display: none;">
        
        <div @click.away="openModal = false" class="bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-2xl w-full max-w-4xl flex flex-col md:flex-row gap-8 lg:gap-10 animate-in zoom-in duration-200">
            <div class="w-full md:w-1/3 flex justify-center items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Tux.png" alt="Boneka Linux" class="h-40 lg:h-56 object-contain">
            </div>

            <div class="w-full md:w-2/3 flex flex-col justify-center text-left">
                <h1 class="text-2xl lg:text-4xl font-bold text-black uppercase">BONEKA LINUX ( TUX )</h1>
                <p class="text-xl lg:text-3xl font-semibold text-black mt-1">Rp 200.000</p>
                
                <div class="border-t-2 border-gray-100 my-4 lg:my-6 w-full"></div>

                <div class="flex items-center gap-4 lg:gap-6 mb-8 lg:mb-10">
                    <div class="relative flex-grow">
    <input type="number" 
           x-model.number="jumlah" 
           min="1"
           @input="if (jumlah < 1) jumlah = 1"
           class="w-full border-2 border-gray-100 rounded-full py-2.5 px-6 text-gray-500 focus:outline-none focus:border-cyan-300 bg-white shadow-sm italic text-sm lg:text-base [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
</div>
                   <div class="flex items-center gap-4 lg:gap-6 text-3xl lg:text-4xl text-gray-300 font-light pr-2">
    <!-- Tombol Kurang -->
    <button @click="if(jumlah > 1) jumlah--" 
            class="hover:text-black transition select-none cursor-pointer">
        &minus;
    </button>
    
    <!-- Tombol Tambah -->
    <button @click="jumlah++" 
            class="hover:text-black transition select-none cursor-pointer">
        &#43;
    </button>
</div>
                </div>

                <div class="flex gap-4">
                    <button @click="openModal = false" class="flex-1 border-2 border-gray-200 text-[#00B4FF] py-2.5 rounded-xl font-bold text-lg hover:bg-gray-50 transition shadow-sm text-center">
                        Kembali
                    </button>
                    <button class="flex-[1.5] bg-[#00B4FF] text-white py-2.5 rounded-xl font-bold text-lg shadow-lg hover:brightness-110 transition text-center">
                        Proses
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>