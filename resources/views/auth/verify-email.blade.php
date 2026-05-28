@extends('layouts.auth')

@section('title', 'Verifikasi Email | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-750 bg-clip-text text-transparent uppercase">Verifikasi Email</h1>
    <p class="text-sm text-slate-450 mt-2.5 font-semibold leading-relaxed">
        Terima kasih telah mendaftar di Polije Mart! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan ulang.
    </p>
</div>

@if (session('status') == 'verification-link-sent')
    <div class="mb-6 bg-emerald-50/80 backdrop-blur border border-emerald-100 px-4 py-3.5 rounded-2xl flex items-center gap-3 shadow-premium text-emerald-800 text-sm font-semibold">
        <div class="p-1 bg-emerald-500 text-white rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
        </div>
        <span>Tautan verifikasi baru telah berhasil dikirim ke alamat email Anda.</span>
    </div>
@endif

<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 border-t border-slate-100 pt-6">
    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
        @csrf
        <button type="submit" class="w-full sm:w-auto py-3.5 px-6 bg-gradient-to-r from-secondary-700 to-secondary-500 text-white font-extrabold rounded-xl hover:brightness-105 active:scale-[0.98] transition-all duration-200 shadow-md shadow-secondary-500/25 flex items-center justify-center gap-2 text-xs uppercase tracking-widest cursor-pointer">
            KIRIM ULANG EMAIL
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
        @csrf
        <button type="submit" class="w-full sm:w-auto py-3.5 px-6 text-xs text-slate-500 hover:text-red-650 bg-slate-50 hover:bg-rose-50 border border-slate-200/60 hover:border-rose-100 rounded-xl font-extrabold uppercase tracking-widest transition-all cursor-pointer flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            LOG OUT
        </button>
    </form>
</div>
@endsection