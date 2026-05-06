@extends('layouts.auth')

@section('title', 'New Password | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">RESET PASSWORD</h1>
    <p class="text-sm text-slate-500 mt-2 font-medium">Buat kata sandi baru untuk mengamankan akun Anda.</p>
</div>

<form action="{{ route('password.store') }}" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div>
        <input type="email" name="email" placeholder="Alamat E-mail" value="{{ old('email', $request->email) }}" required readonly
        class="w-full px-4 py-3 bg-slate-100 text-slate-500 border border-slate-200 outline-none rounded-xl text-sm cursor-not-allowed">
        @error('email') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="password" name="password" placeholder="Password Baru" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('password') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru" required
        class="w-full px-4 py-3 bg-slate-50 border outline-none rounded-xl text-sm transition-all duration-300 focus:bg-white
        @error('password_confirmation') border-red-500 focus:ring-2 focus:ring-red-200 @else border-slate-200 focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 hover:border-[#1C4E80]/50 @enderror">
        @error('password_confirmation') <p class="text-red-500 text-xs mt-1.5 ml-1 font-semibold">{{ $message }}</p> @enderror
    </div>

    <div class="pt-4">
        <button type="submit" class="w-full py-3.5 px-4 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50">
            PERBARUI PASSWORD
        </button>
    </div>
</form>
@endsection