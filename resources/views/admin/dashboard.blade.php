@extends('layouts.sidebar')

@section('title', 'Dashboard - Polije Mart')

@section('content')

<div class="w-full max-w-7xl mx-auto p-6 lg:p-8">
    
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard Overview</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Selamat datang, <span class="text-[#1C4E80] font-bold">{{ auth()->user()->name ?? 'Admin' }}</span>! Berikut adalah ringkasan sistem Polije Mart saat ini.</p>
    </div>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#1C4E80] to-[#0091D5] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18s-.41-.06-.57-.18l-7.9-4.44A.99.99 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18s.41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 4.15L6.04 7.5L12 10.85l5.96-3.35zM5 15.91l6 3.38v-6.71L5 9.21zm14 0v-6.7l-6 3.37v6.71z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Produk</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $total ?? 0 }}</h1>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#069BC0] to-[#047a9c] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18s-.41-.06-.57-.18l-7.9-4.44A.99.99 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18s.41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 4.15L6.04 7.5L12 10.85l5.96-3.35zM5 15.91l6 3.38v-6.71L5 9.21zm14 0v-6.7l-6 3.37v6.71z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Kategori</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $category ?? 0 }}</h1>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#EA6A47] to-[#d65f3f] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Pesanan Masuk</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $order ?? 0 }}</h1>
            </div>
        </div>

    </section>

    {{-- <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 min-h-[300px] flex flex-col items-center justify-center text-center">
            <svg class="w-16 h-16 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            <h3 class="text-lg font-bold text-slate-700">Grafik Penjualan</h3>
            <p class="text-sm text-slate-400 mt-1">Area ini bisa digunakan untuk menampilkan grafik penjualan bulanan ke depannya.</p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 min-h-[300px] flex flex-col items-center justify-center text-center">
            <svg class="w-16 h-16 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2l4-4"></path></svg>
            <h3 class="text-lg font-bold text-slate-700">Aktivitas Terbaru</h3>
            <p class="text-sm text-slate-400 mt-1">Log aktivitas atau pesanan terbaru yang masuk akan tampil di sini.</p>
        </div>
    </section> --}}

</div>

@endsection