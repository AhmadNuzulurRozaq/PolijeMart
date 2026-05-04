<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <title>@yield('title', 'Polije Mart')</title>
</head>

<body class="flex">
    <section class="shrink-0">
        <div class="flex flex-col w-64 h-screen bg-[#1C4E80] text-white p-4 shadow-xl sticky top-0 overflow-y-auto">
            <div class="flex flex-col justify-center text-center gap-3">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" width="100px" class="mx-auto">
                <h3 class="text-2xl font-semibold">POLIJE MART</h3>
            </div>
            <div class="mt-10">
                <ul class="">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" @class([
                            'flex items-center pl-10 gap-2 mt-2 transition-colors duration-300 rounded-full p-2 hover:bg-white hover:text-black',
                            'bg-white text-black active:bg-white active:text-black' => request()->routeIs('admin.dashboard'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6zm2-10h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2" />
                            </svg>
                            <span class="flex items-center font-semibold">DASHBOARD</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.inventory') }}" @class([
                            'flex items-center pl-10 gap-2 mt-2 transition-colors duration-300 rounded-full p-2 hover:bg-white hover:text-black',
                            'bg-white text-black active:bg-white active:text-black' => request()->is('inventory*'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 22q-.825 0-1.412-.587T3 20V8.725q-.45-.275-.725-.712T2 7V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v3q0 .575-.275 1.013T21 8.724V20q0 .825-.587 1.413T19 22zM5 9v11h14V9zM4 7h16V4H4zm5 7h6v-2H9zm3 .5" />
                            </svg>
                            <span class="flex items-center font-semibold">INVENTORY</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manageCategory') }}" @class([
                            'flex items-center pl-10 gap-2 mt-2 transition-colors duration-300 rounded-full p-2 hover:bg-white hover:text-black',
                            'bg-white text-black active:bg-white active:text-black' => request()->is('category*'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 3a3 3 0 1 0 6 0a3 3 0 1 0-6 0" />
                            </svg>
                            <span class="flex items-center font-semibold">CATEGORY</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manageOrder') }}" @class([
                            'flex items-center pl-10 gap-2 mt-2 transition-colors duration-300 rounded-full p-2 hover:bg-white hover:text-black',
                            'bg-white text-black active:bg-white active:text-black' => request()->routeIs('admin.manageOrder*'),
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10 13.25a.75.75 0 0 0 0 1.5h4a.75.75 0 1 0 0-1.5z" />
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M14.665 2.33a.75.75 0 0 1 1.006.335l1.813 3.626q.641.031 1.17.106c1.056.151 1.93.477 2.551 1.245s.757 1.691.684 2.755c-.07 1.031-.35 2.332-.698 3.957l-.451 2.107c-.235 1.097-.426 1.986-.666 2.68c-.25.725-.58 1.32-1.142 1.775s-1.214.652-1.974.745c-.73.089-1.64.089-2.76.089H9.802c-1.122 0-2.031 0-2.761-.089c-.76-.093-1.412-.29-1.974-.745s-.892-1.05-1.142-1.774c-.24-.695-.43-1.584-.666-2.68l-.451-2.107c-.348-1.626-.627-2.927-.698-3.958c-.073-1.064.063-1.986.684-2.755c.62-.768 1.494-1.094 2.55-1.245q.53-.074 1.17-.106L8.33 2.665a.75.75 0 0 1 1.342.67l-1.46 2.917q.546-.003 1.149-.002h5.278q.603 0 1.149.002l-1.459-2.917a.75.75 0 0 1 .335-1.006M5.732 7.858l-.403.806a.75.75 0 1 0 1.342.67l.787-1.574c.57-.01 1.22-.011 1.964-.011h5.156c.744 0 1.394 0 1.964.01l.787 1.575a.75.75 0 0 0 1.342-.67l-.403-.806l.174.023c.884.127 1.317.358 1.597.703c.275.34.41.803.356 1.665H3.605c-.054-.862.081-1.325.356-1.665c.28-.345.713-.576 1.597-.703zM4.288 14.1a81 81 0 0 1-.481-2.35h16.386a83 83 0 0 1-.482 2.35l-.428 2c-.248 1.155-.42 1.954-.627 2.552c-.2.58-.404.886-.667 1.098c-.262.212-.605.348-1.212.422c-.629.077-1.447.078-2.628.078H9.85c-1.18 0-1.998-.001-2.627-.078c-.608-.074-.95-.21-1.212-.422c-.263-.212-.468-.519-.667-1.098c-.207-.598-.38-1.397-.627-2.552z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="flex items-center font-semibold">ORDER</span>
                        </a>
                    </li>

                    <hr class="my-10">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center pl-10 gap-2 mt-2 hover:bg-red-600 active:bg-red-700 hover:text-white active:text-white transition-colors duration-300 p-2 rounded-full font-semibold cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/></svg>
                                LOG OUT
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="flex-1 min-w-0 relative">
        <section class="bg-[#1C4E80] p-5 sticky top-0 z-10 shadow-md">
            <div class="flex justify-end">
                <button type="button" id="avatarIcon" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 16 16"><path fill="white" d="M8 2a6 6 0 1 0 0 12A6 6 0 0 0 8 2M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m7 4.25c1.933 0 3.5-1.214 3.5-3.036C11.5 8.543 10.956 8 10.286 8H5.715c-.671 0-1.214.544-1.214 1.214c0 1.821 1.567 3.036 3.5 3.036zm0-5a1.874 1.874 0 1 0 .001-3.749A1.874 1.874 0 0 0 8 7.25"/></svg>
                </button>
            </div>
            <div id="avatarModal" class="hidden bg-white absolute z-50 right-10 p-6 rounded-md shadow-lg transition-all duration-300 ease-in-out opacity-0 scale-95 origin-top-right">
                <div class="mb-3">
                    <span class="text-lg font-semibold">{{ auth()->user()->name }}</span>
                </div>
                <hr class="border-gray-400">
                <div class="flex flex-col gap-2 mt-3">
                    <a href="#" class="flex flex-1 p-2 bg-white hover:bg-slate-200 items-center gap-3 rounded-md transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1"><path stroke-linejoin="round" d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/><circle cx="12" cy="7" r="3"/></g></svg>
                        <span>Profile Info</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button type="submit" class="flex flex-1 p-2 bg-white hover:bg-red-100 items-center gap-3 rounded-md transition-colors w-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h6.403v1H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h6.404v1zm10.846-4.461l-.702-.72l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.702-.718L20 12z"/></svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
        <section class="rounded-xl">
            @yield('content')
        </section>
    </div>
    
    <script>
        
        const avatarIcon = document.getElementById('avatarIcon');
        const avatarModal = document.getElementById('avatarModal');

        function toggleAvatarModal() {
            if (avatarModal.classList.contains('hidden')) {
                // Buka popup: hapus hidden, lalu mulai animasi
                avatarModal.classList.remove('hidden');
                setTimeout(() => {
                    avatarModal.classList.remove('opacity-0', 'scale-95');
                    avatarModal.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                // Tutup popup: mulai animasi, lalu tambah hidden setelah selesai
                avatarModal.classList.remove('opacity-100', 'scale-100');
                avatarModal.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    avatarModal.classList.add('hidden');
                }, 300); // 300ms menyesuaikan class duration-300
            }
        }

        avatarIcon.addEventListener('click', (event) => {
            toggleAvatarModal();
            event.stopPropagation();
        });

        window.addEventListener('click', (event) => {
            if (!avatarModal.contains(event.target) && !avatarIcon.contains(event.target) && !avatarModal.classList.contains('hidden')) {
                toggleAvatarModal();
            }
        });

    </script>
    @livewireScripts
</body>

</html>