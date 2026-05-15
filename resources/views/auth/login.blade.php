@extends('layouts.auth')

@section('title', 'Login | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">SELAMAT DATANG</h1>
    <p class="text-sm text-slate-500 mt-2 font-medium">Sebelum melanjutkan, silakan login terlebih dahulu.</p>
</div>

<x-auth-session-status class="mb-4 text-green-600 font-bold" :status="session('status')" />

<form action="{{ route('login') }}" method="POST" class="space-y-5">
    @csrf
    
    <!-- Input Email -->
    <div>
        <input type="email" name="email" placeholder="Alamat E-mail" value="{{ old('email') }}" required
        class="w-full px-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('email') border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-200 
        @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('email')
            <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16t-.288-.712T12 15t-.712.288T11 16t.288.713T12 17m0-4q.425 0 .713-.288T13 12V8q0-.425-.288-.712T12 7t-.712.288T11 8v4q0 .425.288.713T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Input Password -->
    <div>
        <input type="password" name="password" placeholder="Password" required
        class="w-full px-4 py-3.5 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password') border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-200 
        @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('password')
            <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold flex items-center gap-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Link Forgot Password -->
    <div class="flex justify-end">
        <a href="{{ route('password.request') }}" class="text-sm text-[#1C4E80] hover:text-[#113253] font-semibold hover:underline transition-colors">Lupa Password?</a>
    </div>

    <!-- Button Submit -->
    <div class="pt-2">
        <button type="submit" class="w-full py-3.5 px-4 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50 cursor-pointer">
            LOGIN
        </button>
    </div>

    <!-- Link Register -->
    <div class="text-center mt-6">
        <span class="text-sm text-slate-500">Belum mempunyai akun? </span>
        <a href="{{ route('register') }}" class="text-sm text-[#1C4E80] hover:text-[#113253] font-bold hover:underline transition-colors">DAFTAR SEKARANG</a>
    </div>
</form>
@endsection