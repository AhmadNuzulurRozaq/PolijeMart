@extends('layouts.auth')

@section('title', 'Confirm Password | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">KONFIRMASI AKSES</h1>
    <p class="text-sm text-slate-500 mt-2 font-medium">Ini adalah area aman aplikasi. Harap konfirmasi password Anda sebelum melanjutkan.</p>
</div>

<form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
    @csrf

    <div>
        <input type="password" name="password" placeholder="Masukkan Password Anda" required autocomplete="current-password"
        class="w-full px-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        
        @error('password')
            <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold flex items-center gap-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-2">
        <button type="submit" class="w-full py-3.5 px-4 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50">
            KONFIRMASI
        </button>
    </div>
</form>
@endsection