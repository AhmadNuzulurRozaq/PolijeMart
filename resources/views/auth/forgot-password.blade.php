@extends('layouts.auth')

@section('title', 'Forgot Password | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Lupa Password?</h1>
    <p class="text-sm text-slate-450 mt-2.5 font-semibold">Masukkan email Anda yang terdaftar, kami akan mengirimkan tautan untuk mereset kata sandi.</p>
</div>

@if(session('status'))
    <div class="mb-6 bg-emerald-50/80 backdrop-blur border border-emerald-100 px-4 py-3.5 rounded-2xl flex items-center gap-3 shadow-premium text-emerald-800 text-sm font-semibold">
        <div class="p-1 bg-emerald-500 text-white rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        </div>
        <span>{{ session('status') }}</span>
    </div>
@endif

<form action="{{ route('password.email') }}" method="POST" class="space-y-5">
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

    <!-- Button Submit -->
    <div class="pt-2">
        <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-secondary-700 to-secondary-500 text-white font-extrabold rounded-xl shadow-md shadow-secondary-500/20 hover:brightness-105 active:scale-[0.98] hover:shadow-lg transition-all duration-300 cursor-pointer tracking-widest text-xs uppercase">
            KIRIM LINK RESET PASSWORD
        </button>
    </div>

    <!-- Back to Login -->
    <div class="text-center pt-4">
        <a href="{{ route('login') }}" class="text-xs text-secondary-650 hover:text-secondary-800 font-black hover:underline transition-colors tracking-widest uppercase flex items-center justify-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Kembali ke Login
        </a>
    </div>
</form>
@endsection