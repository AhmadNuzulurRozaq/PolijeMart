<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Polije Mart')</title>

</head>
<body class="flex flex-col min-h-screen bg-slate-50 font-sans antialiased text-slate-800">
    
    <!-- Global Toast Notification -->
    <div class="fixed top-24 right-5 z-[100] w-full max-w-sm space-y-3">
        @if (session('error'))
            <div x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="p-4 rounded-xl shadow-lg border bg-red-50 border-red-200 text-red-700"
                role="alert">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold">Oops, terjadi kesalahan!</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <button @click="show = false" class="text-current/70 hover:text-current">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </div>
        @endif

        @if (session('status'))
            <div x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="p-4 rounded-xl shadow-lg border bg-green-50 border-green-200 text-green-700"
                role="alert">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold">Sukses!</p>
                        <p class="text-sm">{{ session('status') }}</p>
                    </div>
                    <button @click="show = false" class="text-current/70 hover:text-current">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <!-- Header / Navbar -->
    <header class="bg-primary-950/90 backdrop-blur-md border-b border-white/10 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Kiri: Logo & Branding -->
                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer hover:opacity-90 transition-opacity">
                    <a href="{{ route('customer.index') }}" class="flex items-center gap-3 group">
                        <div class="bg-white/10 p-2 rounded-xl border border-white/10 group-hover:rotate-6 transition-transform duration-300">
                            <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-8 sm:w-10 drop-shadow-md">
                        </div>
                        <span class="text-lg sm:text-xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-100 to-secondary-300 tracking-wider hidden sm:block">POLIJE MART</span>
                    </a>
                </div>

                <!-- Tengah: Search Bar (Hidden di layar sangat kecil, muncul di Tablet/Desktop) -->
                <div class="flex-1 max-w-xl mx-4 lg:mx-8 hidden md:block">
                    <form action="{{ route('customer.allProduct') }}" method="GET" class="relative group">
                        <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                            class="w-full bg-white/5 border border-white/10 text-white placeholder-slate-400 px-5 py-2.5 rounded-full outline-none focus:bg-white focus:text-slate-800 focus:placeholder-slate-400 focus:border-white focus:ring-4 focus:ring-secondary-500/20 transition-all duration-300 shadow-inner text-sm" 
                            placeholder="Cari produk yang Anda butuhkan...">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-secondary-400 focus:outline-none transition-colors p-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                    </form>
                </div>

                <!-- Kanan: Cart & Profile -->
                <div class="flex items-center gap-2 sm:gap-4">
                    
                    <!-- Search Icon Mobile Only -->
                    <button id="mobileSearchBtn" class="md:hidden p-2.5 text-slate-300 hover:text-white hover:bg-white/10 rounded-full transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>

                    <!-- Cart Icon -->
                    <a href="{{ route('customer.cartProduct') }}" class="relative p-2.5 text-slate-300 hover:text-white hover:bg-white/10 rounded-full transition-all group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-105 transition-transform"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        <!-- Notifikasi Angka Cart (Opsional) -->
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute top-1 right-1 bg-gradient-to-r from-orange-500 to-amber-500 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full border-2 border-primary-950 shadow-md animate-pulse">{{ count(session('cart')) }}</span>
                        @endif
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative ml-1 sm:ml-2">
                        <button type="button" id="userMenuBtn" class="flex items-center focus:outline-none p-1 rounded-full border-2 border-transparent hover:border-white/20 transition-all cursor-pointer">
                            @if(Auth::check() && Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full object-cover border border-white/20 shadow-lg">
                            @else
                                <div class="w-10 h-10 bg-gradient-to-br from-secondary-400 to-secondary-600 text-white rounded-full flex items-center justify-center shadow-lg font-bold text-sm border border-white/20">
                                    @if(Auth::check())
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    @endif
                                </div>
                            @endif
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-premium border border-slate-100 py-2 transition-all duration-300 opacity-0 scale-95 origin-top-right z-50">
                            <!-- Info User (Terlihat di Mobile) -->
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? 'user@email.com' }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-slate-600 hover:text-secondary-600 hover:bg-slate-50/80 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.5 1z"></path></svg>
                                Pengaturan Akun
                            </a>
                            <a href="{{ route('customer.manageProduct') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-slate-600 hover:text-secondary-600 hover:bg-slate-50/80 transition-colors">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    Pesanan Saya
                                </div>
                                @if(Auth::check())
                                    @php
                                        $orderCount = \App\Models\Penjualan::where('user_id', Auth::id())->count();
                                    @endphp
                                    @if($orderCount > 0)
                                        <span class="bg-secondary-500 text-white text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-sm shadow-secondary-500/20">{{ $orderCount }}</span>
                                    @endif
                                @endif
                            </a>

                            
                            <hr class="border-slate-100 my-1">
                            
                            <!-- Form Logout yang dipindahkan ke dalam dropdown -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors text-left cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    Keluar Platform
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Search Bar (Toggled) -->
        <div id="mobileSearchBar" class="hidden md:hidden px-4 pb-4 w-full bg-primary-950/95 backdrop-blur-md">
            <form action="{{ route('customer.allProduct') }}" method="GET" class="relative group w-full">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full bg-white/5 border border-white/10 text-white placeholder-slate-400 px-5 py-2.5 rounded-full outline-none focus:bg-white focus:text-slate-800 focus:placeholder-slate-400 transition-all duration-300 shadow-inner text-sm" 
                    placeholder="Cari produk yang Anda butuhkan...">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 transition-colors p-1 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <!-- flex-grow memastikan area konten memanjang penuh hingga footer -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-primary-950 to-slate-950 text-slate-400 mt-auto border-t border-white/5 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,rgba(6,155,192,0.05),transparent_40%)]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col md:flex-row justify-between items-center gap-6 relative z-10">
            <div class="flex items-center gap-4">
                <div class="bg-white/5 p-2 rounded-xl border border-white/5">
                    <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-8 grayscale opacity-75">
                </div>
                <div class="leading-relaxed">
                    <span class="font-bold text-slate-200 tracking-wider text-xs block">SISTEM INFORMASI JUAL BELI POLIJE MART</span>
                    <span class="text-[10px] text-slate-500 font-medium">Open Source IV | v1-2026.05</span>
                </div>
            </div>
            <div class="text-sm font-medium text-slate-500">
                &copy; {{ date('Y') }} Polije Mart. All Rights Reserved.
            </div>
            <div class="flex gap-6 text-sm font-semibold">
                <a href="{{ route('customer.about') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    Tentang Kami
                </a>
            </div>
        </div>
    </footer>

    <!-- Script Fungsional Dropdown -->
    <script>
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');

        function toggleUserMenu() {
            if (userDropdown.classList.contains('hidden')) {
                userDropdown.classList.remove('hidden');
                setTimeout(() => {
                    userDropdown.classList.remove('opacity-0', 'scale-95');
                    userDropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                userDropdown.classList.remove('opacity-100', 'scale-100');
                userDropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    userDropdown.classList.add('hidden');
                }, 300);
            }
        }

        userMenuBtn.addEventListener('click', (event) => {
            toggleUserMenu();
            event.stopPropagation();
        });

        // Fungsionalitas Mobile Search
        const mobileSearchBtn = document.getElementById('mobileSearchBtn');
        const mobileSearchBar = document.getElementById('mobileSearchBar');

        mobileSearchBtn.addEventListener('click', (event) => {
            mobileSearchBar.classList.toggle('hidden');
            if (!mobileSearchBar.classList.contains('hidden')) {
                setTimeout(() => {
                    mobileSearchBar.querySelector('input').focus();
                }, 50);
            }
            event.stopPropagation();
        });

        // Menutup dropdown jika klik di luar elemen
        window.addEventListener('click', (event) => {
            if (!userDropdown.contains(event.target) && !userMenuBtn.contains(event.target) && !userDropdown.classList.contains('hidden')) {
                toggleUserMenu();
            }
            if (mobileSearchBar && !mobileSearchBar.contains(event.target) && !mobileSearchBtn.contains(event.target) && !mobileSearchBar.classList.contains('hidden')) {
                mobileSearchBar.classList.add('hidden');
            }
        });
    </script>
</body>
</html>