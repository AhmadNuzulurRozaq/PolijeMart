@extends('layouts.user.HeaFoot')

@section('title', 'Tentang Kami | Polije Mart')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">

    <div class="w-full mb-12 rounded-[2.5rem] overflow-hidden shadow-premium border border-slate-100 relative group h-48 sm:h-72 lg:h-[450px] bg-slate-900">
        <img src="{{ asset('images/PolijeMart.jpg') }}" alt="Gedung Polije Mart" class="w-full h-full object-cover brightness-75 group-hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-950/30 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="absolute bottom-6 sm:bottom-12 left-6 sm:left-12 z-10">
            <span class="text-xs font-black text-secondary-300 uppercase tracking-[0.2em] bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-md border border-white/10 inline-block mb-3 animate-float">Unit Penunjang Akademik</span>
            <h2 class="text-2xl sm:text-4xl font-black text-white leading-tight drop-shadow-lg">Gedung KPRI<br>Polije Mart</h2>
        </div>
    </div>
    
    <!-- Hero / Header Section -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-extrabold text-secondary-500 uppercase tracking-[0.25em] block mb-2">Profil & Visi</span>
        <h1 class="text-3xl lg:text-4xl font-black text-slate-800 tracking-tight mb-4">
            Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-700 to-secondary-500">Polije Mart</span>
        </h1>
        <div class="h-1.5 w-16 bg-gradient-to-r from-primary-700 to-secondary-500 mx-auto rounded-full mb-6"></div>
        <p class="text-lg text-slate-650 font-semibold leading-relaxed">
            Transformasi digital untuk efisiensi, kemudahan akses, dan jangkauan operasional pelayanan kebutuhan civitas akademika Politeknik Negeri Jember.
        </p>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- Left: Background & Challenges -->
        <div class="lg:col-span-7 space-y-8">
            
            <!-- Latar Belakang Card -->
            <div class="bg-white p-6 sm:p-8 rounded-[2rem] shadow-premium border border-slate-100/80 hover:border-secondary-100 transition-all duration-300 group">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 text-primary-700 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-primary-200/40">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5m-4 0h4" /></svg>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight">Latar Belakang</h2>
                </div>
                <p class="text-slate-600 leading-relaxed mb-4 text-justify font-medium text-sm">
                    Perkembangan teknologi informasi dan komunikasi saat ini telah membawa perubahan besar dalam berbagai sektor kehidupan, termasuk sektor perdagangan. Metode belanja konvensional kini mulai bertransformasi ke arah digital melalui sistem e-commerce. Pemanfaatan e-commerce terbukti memberikan efisiensi yang tinggi, kemudahan akses, serta jangkauan operasional yang lebih luas, baik bagi pelaku usaha maupun konsumen.
                </p>
                <p class="text-slate-600 leading-relaxed text-justify font-medium text-sm">
                    Politeknik Negeri Jember (Polije) memiliki salah satu unit penunjang akademik yang bergerak di bidang pelayanan pemenuhan kebutuhan mahasiswa dan civitas akademika, yaitu <strong>Polije Mart</strong>. Unit usaha ini mengelola berbagai macam komoditas, mulai dari kebutuhan pokok harian hingga Alat Tulis Kantor (ATK). Secara khusus, Polije Mart berlokasi strategis di luar kawasan kampus utama guna memperluas jangkauan pelayanan komersialnya.
                </p>
            </div>

            <!-- Tantangan & Masalah Card -->
            <div class="bg-white p-6 sm:p-8 rounded-[2rem] shadow-premium border border-slate-100/80 hover:border-red-100 transition-all duration-300 group">
                <div class="flex items-center gap-4 mb-5">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-50 to-red-100/60 text-red-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-red-200/30">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight">Tantangan & Permasalahan</h2>
                </div>
                <p class="text-slate-600 leading-relaxed mb-4 text-justify font-medium text-sm">
                    Sebelumnya, Polije Mart telah berupaya melakukan digitalisasi dengan meluncurkan platform e-commerce resmi melalui situs web <em class="text-secondary-600 font-semibold">https://www.belankon.com/</em>. Namun, berdasarkan perkembangan situasi saat ini, sistem informasi pada situs web tersebut sudah tidak dijalankan lagi dan tidak lagi beroperasi untuk melayani kebutuhan transaksi civitas akademika. Dampaknya, operasional pelayanan kembali bergeser pada sistem konvensional.
                </p>
                <p class="text-slate-600 leading-relaxed text-justify font-medium text-sm">
                    Berdasarkan hasil observasi dan wawancara tersebut, ditemukan beberapa permasalahan utama. Pengelolaan transaksi penjualan barang hingga pengecekan ketersediaan stok produk kembali mengandalkan pencatatan manual dan pelayanan langsung di toko. Hal ini menimbulkan keterbatasan bagi mahasiswa yang ingin mengetahui informasi ketersediaan barang atau harga produk terbaru secara cepat tanpa harus mendatangi gerai fisik Polije Mart secara langsung. Seiring dengan berkembangnya teknologi, kendala-kendala keterbatasan ruang dan waktu akibat vakumnya sistem informasi yang lama ini perlu segera diselesaikan melalui pembaruan digitalisasi sistem.
                </p>
            </div>

        </div>

        <!-- Right: Solutions Sidebar -->
        <div class="lg:col-span-5 relative lg:sticky lg:top-24">
            <div class="bg-gradient-to-br from-primary-950 to-slate-950 p-8 sm:p-10 rounded-[2.2rem] shadow-premium text-white relative overflow-hidden border border-white/5">
                <!-- Glowing Decoration blurs -->
                <div class="absolute -top-16 -right-16 w-56 h-56 bg-secondary-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -left-16 w-56 h-56 bg-primary-500/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 border border-white/15 shadow-inner">
                        <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-10 drop-shadow-md">
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black mb-4 tracking-tight leading-tight">Solusi Inovatif</h2>
                    <p class="text-slate-300 leading-relaxed text-justify mb-6 font-medium text-sm">
                        Sebagai solusi dari rumusan masalah di atas, kami menghadirkan kembali pembaruan platform digitalisasi unit usaha internal kampus dengan tema proyek pengembangan:
                    </p>
                    <div class="bg-white/5 border border-white/10 p-5 rounded-2xl mb-6 text-center shadow-inner backdrop-blur-md">
                        <span class="font-black text-xl tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-white to-secondary-300 uppercase drop-shadow-md block">
                            SISTEM INFORMASI<br>JUAL BELI POLIJE MART
                        </span>
                    </div>
                    <p class="text-slate-400 leading-relaxed text-xs text-justify mb-8 font-medium">
                        Alasan memilih Polije Mart sebagai mitra proyek adalah untuk membangun kembali dan memperbarui platform digitalisasi unit usaha internal kampus yang sempat terhenti, memperluas jangkauan akses kebutuhan harian agar dapat diakses kapan saja oleh mahasiswa, serta mempermudah staf pengelola dalam menyajikan informasi produk, stok, dan manajemen transaksi secara terintegrasi dan responsif.
                    </p>

                    <a href="https://www.instagram.com/kpripolije.official" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-3 w-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 hover:from-pink-600 hover:via-red-600 hover:to-yellow-600 text-white font-black py-4 px-6 rounded-2xl transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-1 text-xs uppercase tracking-widest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y2="6.5" y1="6.5"/></svg>
                        Ikuti Instagram Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection