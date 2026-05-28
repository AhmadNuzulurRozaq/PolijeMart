<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/SweetAlert2.js'])
    @livewireStyles
    <title>@yield('title', 'Polije Mart')</title>

    <style>
        /* Animasi kustom untuk konten yang baru di-load */
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased flex h-screen overflow-hidden">

    <!-- Overlay untuk Mobile Sidebar -->
    <div id="sidebarOverlay"
        class="fixed inset-0 bg-slate-900/50 z-20 hidden lg:hidden transition-opacity duration-300 opacity-0 backdrop-blur-sm cursor-pointer">
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-30 w-72 bg-gradient-to-b from-primary-950 to-slate-950 text-slate-300 shadow-2xl transform -translate-x-full lg:translate-x-0 lg:static lg:inset-auto flex flex-col transition-all duration-300 ease-in-out border-r border-white/5">

        <!-- Header Logo -->
        <div class="flex flex-col items-center justify-center p-8 gap-4 border-b border-white/5 shrink-0">
            <div class="bg-white/10 p-2.5 rounded-2xl border border-white/10 hover:rotate-6 transition-transform">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-16 drop-shadow-md">
            </div>
            <h3
                class="text-xl font-black tracking-wider bg-gradient-to-r from-white to-secondary-300 bg-clip-text text-transparent uppercase text-center mt-1">
                POLIJE MART ADMIN</h3>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex-1 overflow-y-auto py-6 px-4 custom-scrollbar">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" @class([
                        'flex items-center px-4 py-3 gap-3.5 rounded-2xl transition-all duration-300 group text-sm uppercase tracking-wider',
                        'bg-white/10 text-white font-extrabold shadow-lg border border-white/10 shadow-white/5' => request()->routeIs(
                            'admin.dashboard'),
                        'text-slate-400 hover:bg-white/5 hover:text-white font-semibold hover:translate-x-1' => !request()->routeIs(
                            'admin.dashboard'),
                    ])>
                        <div @class([
                            'w-10 h-10 rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden transition-all duration-300',
                            'bg-gradient-to-br from-secondary-700 to-secondary-500 text-white shadow-md shadow-secondary-500/20' => request()->routeIs(
                                'admin.dashboard'),
                            'bg-white/5 text-slate-400 group-hover:bg-white/10 group-hover:text-slate-300' => !request()->routeIs(
                                'admin.dashboard'),
                        ])>
                            <svg class="w-5.5 h-5.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inventory') }}" @class([
                        'flex items-center px-4 py-3 gap-3.5 rounded-2xl transition-all duration-300 group text-sm uppercase tracking-wider',
                        'bg-white/10 text-white font-extrabold shadow-lg border border-white/10 shadow-white/5' => request()->is(
                            'inventory*'),
                        'text-slate-400 hover:bg-white/5 hover:text-white font-semibold hover:translate-x-1' => !request()->is(
                            'inventory*'),
                    ])>
                        <div @class([
                            'w-10 h-10 rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden transition-all duration-300',
                            'bg-gradient-to-br from-secondary-700 to-secondary-500 text-white shadow-md shadow-secondary-500/20' => request()->is(
                                'inventory*'),
                            'bg-white/5 text-slate-400 group-hover:bg-white/10 group-hover:text-slate-300' => !request()->is(
                                'inventory*'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5.5 h-5.5" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M12 1.25c-.605 0-1.162.15-1.771.402c-.589.244-1.273.603-2.124 1.05L6.037 3.787c-1.045.548-1.88.987-2.527 1.418c-.668.447-1.184.917-1.559 1.554c-.374.635-.542 1.323-.623 2.142c-.078.795-.078 1.772-.078 3.002v.194c0 1.23 0 2.207.078 3.002c.081.82.25 1.507.623 2.142c.375.637.89 1.107 1.56 1.554c.645.431 1.481.87 2.526 1.418l2.068 1.085c.851.447 1.535.806 2.124 1.05c.61.252 1.166.402 1.771.402s1.162-.15 1.771-.402c.589-.244 1.273-.603 2.124-1.05l2.068-1.084c1.045-.549 1.88-.988 2.526-1.419c.67-.447 1.185-.917 1.56-1.554c.374-.635.542-1.323.623-2.142c.078-.795.078-1.772.078-3.001v-.196c0-1.229 0-2.206-.078-3.001c-.081-.82-.25-1.507-.623-2.142c-.375-.637-.89-1.107-1.56-1.554c-.645-.431-1.481-.87-2.526-1.418l-2.068-1.085c-.851-.447-1.535-.806-2.124-1.05c-.61-.252-1.166-.402-1.771-.402M8.77 4.046c.89-.467 1.514-.793 2.032-1.007c.504-.209.859-.289 1.198-.289c.34 0 .694.08 1.198.289c.518.214 1.141.54 2.031 1.007l2 1.05c1.09.571 1.855.974 2.428 1.356c.282.189.503.364.683.54l-3.331 1.665l-8.5-4.474zm-1.825.958l-.174.092c-1.09.571-1.855.974-2.427 1.356a4.7 4.7 0 0 0-.683.54L12 11.162l3.357-1.68l-8.206-4.318a.8.8 0 0 1-.206-.16M2.938 8.307c-.05.214-.089.457-.117.74c-.07.714-.071 1.617-.071 2.894v.117c0 1.278 0 2.181.071 2.894c.069.697.2 1.148.423 1.528c.222.377.543.696 1.1 1.068c.572.382 1.337.785 2.427 1.356l2 1.05c.89.467 1.513.793 2.031 1.007q.244.101.448.165v-8.663zm9.812 12.818q.204-.063.448-.164c.518-.214 1.141-.54 2.031-1.007l2-1.05c1.09-.572 1.855-.974 2.428-1.356c.556-.372.877-.691 1.1-1.068c.223-.38.353-.83.422-1.528c.07-.713.071-1.616.071-2.893v-.117c0-1.278 0-2.181-.071-2.894a6 6 0 0 0-.117-.74L17.75 9.963V13a.75.75 0 0 1-1.5 0v-2.286l-3.5 1.75z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manageCategory') }}" @class([
                        'flex items-center px-4 py-3 gap-3.5 rounded-2xl transition-all duration-300 group text-sm uppercase tracking-wider',
                        'bg-white/10 text-white font-extrabold shadow-lg border border-white/10 shadow-white/5' => request()->is(
                            'category*'),
                        'text-slate-400 hover:bg-white/5 hover:text-white font-semibold hover:translate-x-1' => !request()->is(
                            'category*'),
                    ])>
                        <div @class([
                            'w-10 h-10 rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden transition-all duration-300',
                            'bg-gradient-to-br from-secondary-700 to-secondary-500 text-white shadow-md shadow-secondary-500/20' => request()->is(
                                'category*'),
                            'bg-white/5 text-slate-400 group-hover:bg-white/10 group-hover:text-slate-300' => !request()->is(
                                'category*'),
                        ])>
                            <svg class="w-5.5 h-5.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M6 20h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM9 16h6M9 12h6" />
                            </svg>
                        </div>
                        <span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manageOrder') }}" @class([
                        'flex items-center px-4 py-3 gap-3.5 rounded-2xl transition-all duration-300 group text-sm uppercase tracking-wider',
                        'bg-white/10 text-white font-extrabold shadow-lg border border-white/10 shadow-white/5' => request()->routeIs(
                            'admin.manageOrder*'),
                        'text-slate-400 hover:bg-white/5 hover:text-white font-semibold hover:translate-x-1' => !request()->routeIs(
                            'admin.manageOrder*'),
                    ])>
                        <div @class([
                            'w-10 h-10 rounded-xl flex items-center justify-center shrink-0 relative overflow-hidden transition-all duration-300',
                            'bg-gradient-to-br from-secondary-700 to-secondary-500 text-white shadow-md shadow-secondary-500/20' => request()->routeIs(
                                'admin.manageOrder*'),
                            'bg-white/5 text-slate-400 group-hover:bg-white/10 group-hover:text-slate-300' => !request()->routeIs(
                                'admin.manageOrder*'),
                        ])>
                            <svg class="w-5.5 h-5.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4" />
                            </svg>
                        </div>
                        <span>Orders</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tombol Logout di Bawah -->
        <div class="p-5 border-t border-white/5 shrink-0 text-center bg-slate-950/40">
            <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block mb-1">Polije Mart Admin
                Panel</span>
            <span class="text-[9px] text-slate-600 font-medium italic block">Open Source IV | v1-2026.05</span>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-50 relative h-screen">

        <!-- Header / Topbar -->
        <header
            class="bg-white/80 backdrop-blur-md sticky top-0 z-25 shadow-sm border-b border-slate-200 p-4 flex items-center justify-between lg:justify-end">

            <!-- Hamburger Menu (Mobile) -->
            <button id="mobileMenuBtn"
                class="lg:hidden text-slate-700 p-2.5 bg-slate-100 rounded-xl hover:bg-slate-250 transition-colors focus:outline-none focus:ring-2 focus:ring-secondary-500/50 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <!-- Profil & Dropdown -->
            <div class="relative">
                <button type="button" id="avatarIcon"
                    class="flex items-center gap-3 cursor-pointer focus:outline-none hover:opacity-80 transition-opacity">
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-sm font-bold text-slate-800 leading-tight">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Administrator</span>
                    </div>
                    @if (auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                            class="w-11 h-11 rounded-full object-cover border border-slate-200 shadow-md">
                    @else
                        <div
                            class="w-11 h-11 bg-gradient-to-br from-primary-650 to-primary-850 text-white rounded-full flex items-center justify-center shadow-lg border border-white font-bold text-sm">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                </button>

                <!-- Dropdown Menu -->
                <div id="avatarModal"
                    class="hidden absolute z-50 right-0 mt-3 w-56 bg-white border border-slate-100 p-2 rounded-2xl shadow-premium transition-all duration-300 ease-in-out opacity-0 translate-y-[-10px] origin-top-right">
                    <div class="p-3 mb-1 md:hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                    </div>
                    <hr class="border-slate-100 md:hidden mb-2">

                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 p-3 text-slate-650 hover:text-secondary-650 hover:bg-slate-50 rounded-xl transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="font-bold text-xs uppercase tracking-wider">Profile Info</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-1">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 p-3 text-red-600 hover:bg-red-50 rounded-xl transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span class="font-bold text-xs uppercase tracking-wider">Logout</span>
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
            if (!avatarModal.contains(event.target) && !avatarIcon.contains(event.target) && !avatarModal.classList
                .contains('hidden')) {
                toggleAvatarModal();
            }
            // Tutup sidebar mobile jika di-klik di luar (meskipun overlay sudah meng-handle, ini memastikan perlindungan ganda)
            if (!sidebar.contains(event.target) && !mobileMenuBtn.contains(event.target) && window.innerWidth <
                1024 && !sidebar.classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
        });
    </script>
    @livewireScripts

</body>

</html>
