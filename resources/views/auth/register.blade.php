@extends('layouts.auth')

@section('title', 'Register | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">BUAT AKUN</h1>
    <p class="text-sm text-slate-500 mt-2 font-medium">Silakan lengkapi data diri Anda di bawah ini.</p>
</div>

<form action="{{ route('register') }}" method="POST" class="space-y-4">
    @csrf
    
    <div>
        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('name') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('name') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="email" name="email" placeholder="Alamat E-mail" value="{{ old('email') }}" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('email') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('email') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="password" name="password" placeholder="Password" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('password') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password_confirmation') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('password_confirmation') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full py-3.5 px-4 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50 cursor-pointer">
            DAFTAR SEKARANG
        </button>
    </div>

    <div class="text-center mt-6">
        <span class="text-sm text-slate-500">Sudah mempunyai akun? </span>
        <a href="{{ route('login') }}" class="text-sm text-[#1C4E80] hover:text-[#113253] font-bold hover:underline transition-colors">LOGIN DI SINI</a>
    </div>
</form>
@endsection