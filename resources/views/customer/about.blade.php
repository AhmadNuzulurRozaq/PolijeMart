@extends('layouts.user.HeaFoot')

@section('title', 'Tentang Kami | Polije Mart')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">

    <div class="w-full mb-10 lg:mb-12 rounded-3xl overflow-hidden shadow-lg border border-slate-100 relative group h-48 sm:h-72 lg:h-96">
        <img src="{{ asset('images/PolijeMart.jpg') }}" alt="Gedung Polije Mart" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-[#1C4E80]/50 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>
    
    <!-- Hero / Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-800 tracking-tight mb-4">
            Tentang <span class="text-[#1C4E80]">Polije Mart</span>
        </h1>
        <div class="h-1.5 w-20 bg-[#069BC0] mx-auto rounded-full mb-6"></div>
        <p class="text-lg text-slate-600 font-medium leading-relaxed">
            Transformasi digital untuk efisiensi, kemudahan akses, dan jangkauan operasional pelayanan kebutuhan civitas akademika Politeknik Negeri Jember.
        </p>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- Kolom Kiri: Latar Belakang & Permasalahan -->
        <div class="lg:col-span-7 space-y-8">
            
            <!-- Latar Belakang Card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300 group">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#1C4E80] flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="M3 9l2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/><path d="M12 3v6"/></svg>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 tracking-tight">Latar Belakang</h2>
                </div>
                <p class="text-slate-600 leading-relaxed mb-4 text-justify">
                    Perkembangan teknologi informasi dan komunikasi saat ini telah membawa perubahan besar dalam berbagai sektor kehidupan, termasuk sektor perdagangan. Metode belanja konvensional kini mulai bertransformasi ke arah digital melalui sistem e-commerce. Pemanfaatan e-commerce terbukti memberikan efisiensi yang tinggi, kemudahan akses, serta jangkauan operasional yang lebih luas, baik bagi pelaku usaha maupun konsumen.
                </p>
                <p class="text-slate-600 leading-relaxed text-justify">
                    Politeknik Negeri Jember (Polije) memiliki salah satu unit penunjang akademik yang bergerak di bidang pelayanan pemenuhan kebutuhan mahasiswa dan civitas akademika, yaitu <strong>Polije Mart</strong>. Unit usaha ini mengelola berbagai macam komoditas, mulai dari kebutuhan pokok harian hingga Alat Tulis Kantor (ATK). Secara khusus, Polije Mart berlokasi strategis di luar kawasan kampus utama guna memperluas jangkauan pelayanan komersialnya.
                </p>
            </div>

            <!-- Tantangan & Masalah Card -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300 group">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 tracking-tight">Tantangan & Permasalahan</h2>
                </div>
                <p class="text-slate-600 leading-relaxed mb-4 text-justify">
                    Sebelumnya, Polije Mart telah berupaya melakukan digitalisasi dengan meluncurkan platform e-commerce resmi melalui situs web <em class="text-blue-500">https://www.belankon.com/</em>. Namun, berdasarkan perkembangan situasi saat ini, sistem informasi pada situs web tersebut sudah tidak dijalankan lagi dan tidak lagi beroperasi untuk melayani kebutuhan transaksi civitas akademika. Dampaknya, operasional pelayanan kembali bergeser pada sistem konvensional.
                </p>
                <p class="text-slate-600 leading-relaxed text-justify">
                    Berdasarkan hasil observasi dan wawancara tersebut, ditemukan beberapa permasalahan utama. Pengelolaan transaksi penjualan barang hingga pengecekan ketersediaan stok produk kembali mengandalkan pencatatan manual dan pelayanan langsung di toko. Hal ini menimbulkan keterbatasan bagi mahasiswa yang ingin mengetahui informasi ketersediaan barang atau harga produk terbaru secara cepat tanpa harus mendatangi gerai fisik Polije Mart secara langsung. Seiring dengan berkembangnya teknologi, kendala-kendala keterbatasan ruang dan waktu akibat vakumnya sistem informasi yang lama ini perlu segera diselesaikan melalui pembaruan digitalisasi sistem.
                </p>
            </div>

        </div>

        <!-- Kolom Kanan: Solusi (Sticky) -->
        <div class="lg:col-span-5 relative lg:sticky lg:top-28">
            <div class="bg-gradient-to-br from-[#1C4E80] to-[#0a233b] p-8 sm:p-10 rounded-[2rem] shadow-xl text-white relative overflow-hidden">
                <!-- Dekorasi Visual -->
                <div class="absolute -top-16 -right-16 w-56 h-56 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -left-16 w-56 h-56 bg-[#069BC0]/20 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 border border-white/20 shadow-inner">
                        <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-10 sm:w-12 drop-shadow-md">
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold mb-4 tracking-wide">Solusi Inovatif</h2>
                    <p class="text-blue-100 leading-relaxed text-justify mb-6">
                        Sebagai solusi dari rumusan masalah di atas, penulis memilih tema proyek pengembangan sistem informasi penjualan digital dengan judul:
                    </p>
                    <div class="bg-white/10 border border-white/20 p-5 rounded-2xl mb-6 text-center shadow-inner backdrop-blur-sm">
                        <span class="font-black text-xl sm:text-2xl tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-white to-blue-200 uppercase drop-shadow-sm">
                            Sistem Informasi<br>Jual Beli Polije Mart
                        </span>
                    </div>
                    <p class="text-blue-100/90 leading-relaxed text-sm text-justify mb-8">
                        Alasan memilih Polije Mart sebagai mitra proyek adalah untuk membangun kembali dan memperbarui platform digitalisasi unit usaha internal kampus yang sempat terhenti, memperluas jangkauan akses kebutuhan harian agar dapat diakses kapan saja oleh mahasiswa, serta mempermudah staf pengelola dalam menyajikan informasi produk, stok, dan manajemen transaksi secara terintegrasi dan responsif.
                    </p>

                    <a href="https://www.instagram.com/kpripolije.official" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-3 w-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 hover:from-pink-600 hover:via-red-600 hover:to-yellow-600 text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                        Ikuti Instagram Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection