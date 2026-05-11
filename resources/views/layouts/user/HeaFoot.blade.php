<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Polije Mart')</title>
</head>
<body class="flex flex-col min-h-screen bg-slate-50 font-sans antialiased text-slate-800">
    
    <!-- Header / Navbar -->
    <header class="bg-gradient-to-r from-[#1C4E80] to-[#0a233b] shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Kiri: Logo & Branding -->
                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer hover:opacity-90 transition-opacity">
                    <a href="{{ route('customer.index') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-10 sm:w-12 drop-shadow-md">
                        <h3 class="text-xl sm:text-2xl font-extrabold text-white tracking-wide hidden sm:block">POLIJE MART</h3>
                    </a>
                </div>

                <!-- Tengah: Search Bar (Hidden di layar sangat kecil, muncul di Tablet/Desktop) -->
                <div class="flex-1 max-w-xl mx-4 lg:mx-8 hidden md:block">
                    <form action="{{ route('customer.allProduct') }}" method="GET" class="relative group">
                        <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                            class="w-full bg-white/10 border border-white/20 text-white placeholder-white/70 px-5 py-2.5 rounded-full outline-none focus:bg-white focus:text-slate-800 focus:placeholder-slate-400 transition-all duration-300 shadow-sm" 
                            placeholder="Cari produk yang Anda butuhkan...">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-white group-focus-within:text-[#069BC0] transition-colors p-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
                        </button>
                    </form>
                </div>

                <!-- Kanan: Cart & Profile -->
                <div class="flex items-center gap-2 sm:gap-4">
                    
                    <!-- Search Icon Mobile Only -->
                    <button class="md:hidden p-2 text-white hover:bg-white/10 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.47 6.47 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/></svg>
                    </button>

                    <!-- Cart Icon -->
                    <a href="{{ route('customer.cartProduct') }}" class="relative p-2 text-white hover:bg-white/10 rounded-full transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
                        <!-- Notifikasi Angka Cart (Opsional) -->
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="absolute top-0 right-0 bg-orange-500 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full border-2 border-[#069BC0]">{{ count(session('cart')) }}</span>
                        @endif
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative ml-1 sm:ml-2">
                        <button type="button" id="userMenuBtn" class="flex items-center focus:outline-none p-1 rounded-full border-2 border-transparent hover:border-white/50 transition-all cursor-pointer">
                            <div class="w-9 h-9 bg-white text-[#069BC0] rounded-full flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" d="M8 2a6 6 0 1 0 0 12A6 6 0 0 0 8 2M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m7 4.25c1.933 0 3.5-1.214 3.5-3.036C11.5 8.543 10.956 8 10.286 8H5.715c-.671 0-1.214.544-1.214 1.214c0 1.821 1.567 3.036 3.5 3.036zm0-5a1.874 1.874 0 1 0 .001-3.749A1.874 1.874 0 0 0 8 7.25"/></svg>
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 transition-all duration-300 opacity-0 scale-95 origin-top-right z-50">
                            <!-- Info User (Terlihat di Mobile) -->
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ auth()->user()->email ?? 'user@email.com' }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-[#069BC0] hover:bg-slate-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a5 5 0 1 0 0-10a5 5 0 0 0 0 10m-7 9a7 7 0 1 1 14 0"/></svg>
                                Akun Saya
                            </a>
                            <a href="{{ route('customer.manageProduct') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-[#069BC0] hover:bg-slate-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4"/></svg>
                                Pesanan Saya
                            </a>
                            
                            <hr class="border-slate-100 my-1">
                            
                            <!-- Form Logout yang dipindahkan ke dalam dropdown -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors text-left cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h6.403v1H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h6.404v1zm10.846-4.461l-.702-.72l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.702-.718L20 12z"/></svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <!-- flex-grow memastikan area konten memanjang penuh hingga footer -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-[#0a233b] to-[#07192a] text-slate-300 mt-auto border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-8 grayscale opacity-70">
                <span class="italic text-xs tracking-wide text-white">Sistem Informasi Penjualan Polije Mart <br>
                    Open Source IV | v1-2026.05
                </span>
            </div>
            <div class="text-sm font-medium">
                &copy; {{ date('Y') }} Polije Mart. All Rights Reserved.
            </div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Bantuan</a>
                <a href="#" class="hover:text-white transition-colors">Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Syarat</a>
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

        // Menutup dropdown jika klik di luar elemen
        window.addEventListener('click', (event) => {
            if (!userDropdown.contains(event.target) && !userMenuBtn.contains(event.target) && !userDropdown.classList.contains('hidden')) {
                toggleUserMenu();
            }
        });
    </script>
</body>
</html>