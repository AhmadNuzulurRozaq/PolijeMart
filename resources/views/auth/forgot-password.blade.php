@extends('layouts.auth')

@section('title', 'Forgot Password | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">LUPA PASSWORD?</h1>
    <p class="text-sm text-slate-500 mt-2 font-medium">Masukkan email Anda yang terdaftar, kami akan mengirimkan tautan untuk mereset kata sandi.</p>
</div>

@if(session('status'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m10 17l-5-5l1.41-1.42L10 14.17l7.59-7.59L19 8m-7-6A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2"/></svg>
        <span class="text-sm font-semibold">{{ session('status') }}</span>
    </div>
@endif

<form action="{{ route('password.email') }}" method="POST" class="space-y-5">
    @csrf
    
    <div>
        <input type="email" name="email" placeholder="Alamat E-mail" value="{{ old('email') }}" required
        class="w-full px-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('email') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('email') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div class="pt-2">
        <button type="submit" class="w-full py-3.5 px-4 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50">
            KIRIM LINK RESET
        </button>
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('login') }}" class="text-sm text-slate-500 hover:text-[#1C4E80] font-bold hover:underline transition-colors flex items-center justify-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 18l-6-6l6-6"/></svg>
            Kembali ke Login
        </a>
    </div>
</form>
@endsection