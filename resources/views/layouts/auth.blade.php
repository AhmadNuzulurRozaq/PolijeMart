<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/logopolije.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Polije Mart')</title>
</head>
<body class="min-h-screen flex flex-col lg:flex-row bg-slate-50 font-sans antialiased overflow-x-hidden relative">
    
    <!-- Left Form Section (Center on mobile, Left side on desktop) -->
    <section class="w-full lg:w-1/2 min-h-screen flex flex-col justify-center items-center p-6 sm:p-12 z-10 relative">
        <!-- Aesthetic background blur lights -->
        <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-secondary-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 -z-10 animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-primary-500/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2 -z-10 animate-pulse" style="animation-delay: 2s"></div>
        
        <div class="w-full max-w-md bg-white/90 backdrop-blur-md p-8 sm:p-10 rounded-[2.5rem] shadow-premium border border-slate-200/40 hover:shadow-premium-hover transition-all duration-550 ease-out">
            <!-- Mobile logo -->
            <div class="lg:hidden flex justify-center mb-8">
                <div class="p-4 bg-slate-50 rounded-3xl border border-slate-150 shadow-inner">
                    <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-16 drop-shadow-md">
                </div>
            </div>
            
            @yield('content')
            
        </div>
    </section>

    <!-- Right Branding Section (Desktop only) -->
    <section class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-primary-950 via-primary-900 to-slate-950 justify-center items-center p-12 rounded-l-[3.5rem] shadow-[-20px_0_50px_rgba(10,27,48,0.15)] relative overflow-hidden border-l border-white/5">
        <!-- Floating decorative lights -->
        <div class="absolute top-0 right-0 w-[450px] h-[450px] bg-secondary-500/10 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-[450px] h-[450px] bg-primary-500/15 rounded-full blur-3xl -translate-x-1/3 translate-y-1/3 animate-pulse" style="animation-delay: 3s"></div>

        <div class="flex flex-col items-center text-center gap-10 relative z-10">
            <!-- Floating logo glass container -->
            <div class="bg-white/10 p-9 rounded-[3rem] backdrop-blur-md border border-white/20 shadow-2xl animate-float-slow">
                <img src="{{ asset('images/logoPolije.png') }}" alt="Logo Polije" class="w-36 hover:scale-105 transition-transform duration-500 drop-shadow-2xl">
            </div>
            
            <div class="text-white space-y-4">
                <h1 class="font-black text-5xl tracking-widest bg-gradient-to-r from-white via-slate-200 to-secondary-300 bg-clip-text text-transparent drop-shadow-md">POLIJE MART</h1>
                <div class="h-1 w-20 bg-gradient-to-r from-secondary-500 to-primary-400 mx-auto rounded-full"></div>
                <p class="text-slate-300 text-lg font-bold tracking-wide max-w-sm mx-auto leading-relaxed">
                    Solusi Belanja Praktis & Modern di Lingkungan Kampus
                </p>
            </div>
        </div>
    </section>
    
</body>
</html>