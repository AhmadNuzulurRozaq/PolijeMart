<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/SweetAlert2'])
    @livewireStyles
    <title>@yield('title', 'Polije Mart')</title>
    <style>
        /* Animasi kustom untuk konten yang baru di-load */
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased flex h-screen overflow-hidden">

    <!-- Overlay untuk Mobile Sidebar -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 z-20 hidden lg:hidden transition-opacity duration-300 opacity-0 backdrop-blur-sm cursor-pointer"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-72 bg-[#1C4E80] text-white shadow-2xl transform -translate-x-full lg:translate-x-0 lg:static lg:inset-auto flex flex-col transition-transform duration-300 ease-in-out">
        
        <!-- Header Logo -->
        <div class="flex flex-col items-center justify-center p-8 gap-4 border-b border-white/10 shrink-0">
            <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-24 drop-shadow-lg hover:scale-105 transition-transform duration-500">
            <h3 class="text-2xl font-bold tracking-widest bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">POLIJE MART</h3>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex-1 overflow-y-auto py-6 px-4 custom-scrollbar">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" @class([
                        'flex items-center px-4 py-3 gap-3 rounded-xl transition-all duration-300 group',
                        'bg-white text-[#1C4E80] shadow-md font-bold' => request()->routeIs('admin.dashboard'),
                        'hover:bg-white/10 hover:translate-x-1 font-medium' => !request()->routeIs('admin.dashboard'),
                    ])>
                        <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-[#1C4E80]' : 'text-slate-300 group-hover:text-white transition-colors' }}" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6zm2-10h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2" />
                        </svg>
                        <span>DASHBOARD</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inventory') }}" @class([
                        'flex items-center px-4 py-3 gap-3 rounded-xl transition-all duration-300 group',
                        'bg-white text-[#1C4E80] shadow-md font-bold' => request()->is('inventory*'),
                        'hover:bg-white/10 hover:translate-x-1 font-medium' => !request()->is('inventory*'),
                    ])>
                        <svg class="{{ request()->is('inventory*') ? 'text-[#1C4E80]' : 'text-slate-300 group-hover:text-white transition-colors' }}" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20V8.725q-.45-.275-.725-.712T2 7V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v3q0 .575-.275 1.013T21 8.724V20q0 .825-.587 1.413T19 22zM5 9v11h14V9zM4 7h16V4H4zm5 7h6v-2H9zm3 .5" />
                        </svg>
                        <span>INVENTORY</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manageCategory') }}" @class([
                        'flex items-center px-4 py-3 gap-3 rounded-xl transition-all duration-300 group',
                        'bg-white text-[#1C4E80] shadow-md font-bold' => request()->is('category*'),
                        'hover:bg-white/10 hover:translate-x-1 font-medium' => !request()->is('category*'),
                    ])>
                        <svg class="{{ request()->is('category*') ? 'text-[#1C4E80]' : 'text-slate-300 group-hover:text-white transition-colors' }}" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                        </svg>
                        <span>CATEGORY</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manageOrder') }}" @class([
                        'flex items-center px-4 py-3 gap-3 rounded-xl transition-all duration-300 group',
                        'bg-white text-[#1C4E80] shadow-md font-bold' => request()->routeIs('admin.manageOrder*'),
                        'hover:bg-white/10 hover:translate-x-1 font-medium' => !request()->routeIs('admin.manageOrder*'),
                    ])>
                        <svg class="{{ request()->routeIs('admin.manageOrder*') ? 'text-[#1C4E80]' : 'text-slate-300 group-hover:text-white transition-colors' }}" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M10 13.25a.75.75 0 0 0 0 1.5h4a.75.75 0 1 0 0-1.5z" />
                            <path fill="currentColor" fill-rule="evenodd" d="M14.665 2.33a.75.75 0 0 1 1.006.335l1.813 3.626q.641.031 1.17.106c1.056.151 1.93.477 2.551 1.245s.757 1.691.684 2.755c-.07 1.031-.35 2.332-.698 3.957l-.451 2.107c-.235 1.097-.426 1.986-.666 2.68c-.25.725-.58 1.32-1.142 1.775s-1.214.652-1.974.745c-.73.089-1.64.089-2.76.089H9.802c-1.122 0-2.031 0-2.761-.089c-.76-.093-1.412-.29-1.974-.745s-.892-1.05-1.142-1.774c-.24-.695-.43-1.584-.666-2.68l-.451-2.107c-.348-1.626-.627-2.927-.698-3.958c-.073-1.064.063-1.986.684-2.755c.62-.768 1.494-1.094 2.55-1.245q.53-.074 1.17-.106L8.33 2.665a.75.75 0 0 1 1.342.67l-1.46 2.917q.546-.003 1.149-.002h5.278q.603 0 1.149.002l-1.459-2.917a.75.75 0 0 1 .335-1.006M5.732 7.858l-.403.806a.75.75 0 1 0 1.342.67l.787-1.574c.57-.01 1.22-.011 1.964-.011h5.156c.744 0 1.394 0 1.964.01l.787 1.575a.75.75 0 0 0 1.342-.67l-.403-.806l.174.023c.884.127 1.317.358 1.597.703c.275.34.41.803.356 1.665H3.605c-.054-.862.081-1.325.356-1.665c.28-.345.713-.576 1.597-.703zM4.288 14.1a81 81 0 0 1-.481-2.35h16.386a83 83 0 0 1-.482 2.35l-.428 2c-.248 1.155-.42 1.954-.627 2.552c-.2.58-.404.886-.667 1.098c-.262.212-.605.348-1.212.422c-.629.077-1.447.078-2.628.078H9.85c-1.18 0-1.998-.001-2.627-.078c-.608-.074-.95-.21-1.212-.422c-.263-.212-.468-.519-.667-1.098c-.207-.598-.38-1.397-.627-2.552z" clip-rule="evenodd" />
                        </svg>
                        <span>ORDER</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tombol Logout di Bawah -->
        <div class="p-4 border-t border-white/10 shrink-0 mb-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 py-3 px-4 bg-red-500/80 hover:bg-red-600 text-white rounded-xl font-semibold shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/></svg>
                    LOG OUT
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 relative h-screen">
        
        <!-- Header / Topbar -->
        <header class="bg-white/80 backdrop-blur-md sticky top-0 z-20 shadow-sm border-b border-slate-200 p-4 flex items-center justify-between lg:justify-end">
            
            <!-- Hamburger Menu (Mobile) -->
            <button id="mobileMenuBtn" class="lg:hidden text-[#1C4E80] p-2 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>

            <!-- Profil & Dropdown -->
            <div class="relative">
                <button type="button" id="avatarIcon" class="flex items-center gap-3 cursor-pointer focus:outline-none hover:opacity-80 transition-opacity">
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</span>
                        <span class="text-xs text-slate-500 font-medium">Administrator</span>
                    </div>
                    <div class="w-11 h-11 bg-[#1C4E80] text-white rounded-full flex items-center justify-center shadow-md border-2 border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" d="M8 2a6 6 0 1 0 0 12A6 6 0 0 0 8 2M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m7 4.25c1.933 0 3.5-1.214 3.5-3.036C11.5 8.543 10.956 8 10.286 8H5.715c-.671 0-1.214.544-1.214 1.214c0 1.821 1.567 3.036 3.5 3.036zm0-5a1.874 1.874 0 1 0 .001-3.749A1.874 1.874 0 0 0 8 7.25"/></svg>
                    </div>
                </button>

                <!-- Dropdown Menu -->
                <div id="avatarModal" class="hidden absolute z-50 right-0 mt-3 w-56 bg-white border border-slate-100 p-2 rounded-xl shadow-xl transition-all duration-300 ease-in-out opacity-0 translate-y-[-10px] origin-top-right">
                    <div class="p-3 mb-1 md:hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                    </div>
                    <hr class="border-slate-100 md:hidden mb-2">
                    
                    <a href="#" class="flex items-center gap-3 p-3 text-slate-600 hover:text-[#1C4E80] hover:bg-slate-50 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/><circle cx="12" cy="7" r="3"/></g></svg>
                        <span class="font-medium text-sm">Profile Info</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-1">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 p-3 text-red-600 hover:bg-red-50 rounded-lg transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h6.403v1H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h6.404v1zm10.846-4.461l-.702-.72l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.702-.718L20 12z"/></svg>
                            <span class="font-medium text-sm">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Dynamic Content -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-8">
            <div class="fade-in-up">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Script Fungsional -->
    <script>
        // --- Avatar Dropdown Script ---
        const avatarIcon = document.getElementById('avatarIcon');
        const avatarModal = document.getElementById('avatarModal');

        function toggleAvatarModal() {
            if (avatarModal.classList.contains('hidden')) {
                avatarModal.classList.remove('hidden');
                // Timeout agar browser me-render display:block sebelum transisi jalan
                setTimeout(() => {
                    avatarModal.classList.remove('opacity-0', 'translate-y-[-10px]');
                    avatarModal.classList.add('opacity-100', 'translate-y-0');
                }, 10);
            } else {
                avatarModal.classList.remove('opacity-100', 'translate-y-0');
                avatarModal.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => {
                    avatarModal.classList.add('hidden');
                }, 300);
            }
        }

        avatarIcon.addEventListener('click', (event) => {
            toggleAvatarModal();
            event.stopPropagation();
        });

        // --- Mobile Sidebar Toggle Script ---
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            // Geser posisi sidebar
            sidebar.classList.toggle('-translate-x-full');
            
            // Atur overlay
            if (sidebarOverlay.classList.contains('hidden')) {
                sidebarOverlay.classList.remove('hidden');
                setTimeout(() => sidebarOverlay.classList.remove('opacity-0'), 10);
            } else {
                sidebarOverlay.classList.add('opacity-0');
                setTimeout(() => sidebarOverlay.classList.add('hidden'), 300);
            }
        }

        mobileMenuBtn.addEventListener('click', (event) => {
            toggleSidebar();
            event.stopPropagation();
        });

        sidebarOverlay.addEventListener('click', toggleSidebar);

        // Global click untuk menutup pop-ups jika area kosong di-klik
        window.addEventListener('click', (event) => {
            // Tutup dropdown jika terbuka
            if (!avatarModal.contains(event.target) && !avatarIcon.contains(event.target) && !avatarModal.classList.contains('hidden')) {
                toggleAvatarModal();
            }
            // Tutup sidebar mobile jika di-klik di luar (meskipun overlay sudah meng-handle, ini memastikan perlindungan ganda)
            if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target) && window.innerWidth < 1024 && !sidebar.classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
        });
    </script>
    @livewireScripts
    
</body>

</html>