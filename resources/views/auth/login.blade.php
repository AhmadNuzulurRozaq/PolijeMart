@extends('layouts.auth')

@section('title', 'Login | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Selamat Datang</h1>
    <p class="text-sm text-slate-450 mt-2.5 font-semibold">Sebelum melanjutkan, silakan login terlebih dahulu menggunakan akun Anda.</p>
</div>

<x-auth-session-status class="mb-4 text-emerald-600 font-extrabold text-sm" :status="session('status')" />

<form action="{{ route('login') }}" method="POST" class="space-y-5">
    @csrf
    
    <!-- Input Email -->
    <div class="flex flex-col gap-1">
        <label for="email" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Alamat E-Mail</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
            </div>
            <input type="email" name="email" id="email" placeholder="nama@email.com" value="{{ old('email') }}" required
            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('email') border-red-500 focus:border-red-600 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('email')
            <p class="text-red-600 text-xs font-bold mt-1.5 ml-1.5 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span>{{ $message }}</span>
            </p>
        @enderror
    </div>

    <!-- Input Password -->
    <div class="flex flex-col gap-1">
        <label for="password" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Kata Sandi</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
            </div>
            <input type="password" name="password" id="password" placeholder="••••••••" required
            class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('password') border-red-500 focus:border-red-600 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('password')
            <p class="text-red-600 text-xs font-bold mt-1.5 ml-1.5 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <span>{{ $message }}</span>
            </p>
        @enderror
    </div>

    <!-- Link Forgot Password -->
    <div class="flex justify-end pr-1">
        <a href="{{ route('password.request') }}" class="text-xs text-secondary-650 hover:text-secondary-800 font-extrabold hover:underline transition-colors tracking-wide uppercase">Lupa Password?</a>
    </div>

    <!-- Button Submit -->
    <div class="pt-2">
        <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-secondary-700 to-secondary-500 text-white font-extrabold rounded-xl shadow-md shadow-secondary-500/20 hover:brightness-105 active:scale-[0.98] hover:shadow-lg transition-all duration-300 cursor-pointer tracking-widest text-xs uppercase">
            MASUK SEKARANG
        </button>
    </div>

    <!-- Link Register -->
    <div class="text-center pt-4">
        <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Belum mempunyai akun? </span>
        <a href="{{ route('register') }}" class="text-xs text-secondary-650 hover:text-secondary-800 font-black hover:underline transition-colors tracking-widest uppercase">DAFTAR SEKARANG</a>
    </div>
</form>
@endsection