@extends('layouts.auth')

@section('title', 'Register | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Buat Akun Baru</h1>
    <p class="text-sm text-slate-450 mt-2.5 font-semibold">Silakan lengkapi informasi data diri Anda untuk pendaftaran akun baru.</p>
</div>

<form action="{{ route('register') }}" method="POST" class="space-y-4">
    @csrf
    
    <!-- Input Nama Lengkap -->
    <div class="flex flex-col gap-1">
        <label for="name" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Nama Lengkap</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
            </div>
            <input type="text" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required
            class="w-full pl-11 pr-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('name') border-rose-450 focus:border-rose-500 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('name') <p class="text-rose-550 text-xs font-bold mt-1 ml-1.5">{{ $message }}</p> @enderror
    </div>

    <!-- Input Email -->
    <div class="flex flex-col gap-1">
        <label for="email" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Alamat E-Mail</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
            </div>
            <input type="email" name="email" id="email" placeholder="nama@email.com" value="{{ old('email') }}" required
            class="w-full pl-11 pr-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('email') border-rose-450 focus:border-rose-500 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('email') <p class="text-rose-550 text-xs font-bold mt-1 ml-1.5">{{ $message }}</p> @enderror
    </div>

    <!-- Input Password -->
    <div class="flex flex-col gap-1">
        <label for="password" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Kata Sandi</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
            </div>
            <input type="password" name="password" id="password" placeholder="Min. 8 Karakter" required
            class="w-full pl-11 pr-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('password') border-rose-450 focus:border-rose-500 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('password') <p class="text-rose-550 text-xs font-bold mt-1 ml-1.5">{{ $message }}</p> @enderror
    </div>

    <!-- Input Password Confirmation -->
    <div class="flex flex-col gap-1">
        <label for="password_confirmation" class="text-xs font-black text-slate-700 uppercase tracking-wider pl-1.5">Ulangi Kata Sandi</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>
            </div>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Kata Sandi" required
            class="w-full pl-11 pr-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 font-semibold text-slate-800 focus:bg-white focus:ring-4 focus:ring-secondary-500/10
            @error('password_confirmation') border-rose-450 focus:border-rose-500 @else border-slate-200 focus:border-secondary-500 hover:border-slate-350 @enderror">
        </div>
        @error('password_confirmation') <p class="text-rose-550 text-xs font-bold mt-1 ml-1.5">{{ $message }}</p> @enderror
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-secondary-700 to-secondary-500 text-white font-extrabold rounded-xl shadow-md shadow-secondary-500/20 hover:brightness-105 active:scale-[0.98] hover:shadow-lg transition-all duration-300 cursor-pointer tracking-widest text-xs uppercase">
            DAFTAR SEKARANG
        </button>
    </div>

    <!-- Link Login -->
    <div class="text-center pt-4">
        <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Sudah mempunyai akun? </span>
        <a href="{{ route('login') }}" class="text-xs text-secondary-650 hover:text-secondary-800 font-black hover:underline transition-colors tracking-widest uppercase">MASUK DI SINI</a>
    </div>
</form>
@endsection