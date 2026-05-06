<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Polije Mart')</title>
</head>
<body class="min-h-screen flex flex-col lg:flex-row bg-slate-50 font-sans antialiased overflow-x-hidden">
    
    <!-- Form Section (Kiri di Desktop, Penuh di Mobile) -->
    <section class="w-full lg:w-1/2 min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 z-10 relative">
        <!-- Dekorasi Background Bulat Blur (Opsional untuk estetika) -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-[#1C4E80]/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 -z-10"></div>
        
        <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-slate-100 transition-all">
            <!-- Munculkan logo di Mobile saja -->
            <div class="lg:hidden flex justify-center mb-6">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-20 drop-shadow-md">
            </div>
            
            @yield('content')
            
        </div>
    </section>

    <!-- Branding Section (Kanan di Desktop, Sembunyi di Mobile) -->
    <section class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-[#1C4E80] to-[#0a233b] justify-center items-center p-12 rounded-l-[3rem] shadow-[-20px_0_40px_rgba(0,0,0,0.1)] relative overflow-hidden">
        <!-- Pattern/Dekorasi Aesthetic -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>

        <div class="flex flex-col items-center text-center gap-8 relative z-10">
            <div class="bg-white/10 p-8 rounded-full backdrop-blur-sm border border-white/20 shadow-2xl">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-40 hover:scale-105 transition-transform duration-500 drop-shadow-xl">
            </div>
            <div class="text-white space-y-2">
                <h1 class="font-extrabold text-4xl tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-slate-300 drop-shadow-sm">POLIJE MART</h1>
                <h3 class="text-blue-200 text-lg font-medium tracking-wide">Solusi Kepraktisan Belanja Anda</h3>
            </div>
        </div>
    </section>
    
</body>
</html>