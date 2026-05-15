@extends('layouts.auth')

@section('title', 'Verifikasi Email | Polije Mart')

@section('content')
<div class="mb-8 text-center lg:text-left">
    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">VERIFIKASI EMAIL</h1>
    <p class="text-sm text-slate-500 mt-3 font-medium leading-relaxed">
        Terima kasih telah mendaftar di Polije Mart! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan ulang.
    </p>
</div>

@if (session('status') == 'verification-link-sent')
    <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-xl flex items-start gap-3 shadow-sm">
        <svg class="shrink-0 mt-0.5 text-green-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m10 17l-5-5l1.41-1.42L10 14.17l7.59-7.59L19 8m-7-6A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2"/></svg>
        <span class="text-sm font-semibold leading-tight">Tautan verifikasi baru telah berhasil dikirim ke alamat email yang Anda berikan saat pendaftaran.</span>
    </div>
@endif

<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6 border-t border-slate-100 pt-6">
    <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
        @csrf
        <button type="submit" class="w-full sm:w-auto py-3.5 px-6 bg-[#1C4E80] text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:bg-[#143a60] active:bg-[#0a233b] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#1C4E80]/50 text-sm">
            KIRIM ULANG EMAIL
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
        @csrf
        <button type="submit" class="w-full sm:w-auto py-3.5 px-6 text-sm text-slate-500 hover:text-red-600 bg-slate-50 hover:bg-red-50 rounded-xl font-bold transition-colors focus:outline-none flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M5.616 20q-.691 0-1.153-.462T4 18.384V5.616q0-.691.463-1.153T5.616 4h6.403v1H5.616q-.231 0-.424.192T5 5.616v12.769q0 .23.192.423t.423.192h6.404v1zm10.846-4.461l-.702-.72l2.319-2.319H9.192v-1h8.887l-2.32-2.32l.702-.718L20 12z"/></svg>
            LOG OUT
        </button>
    </form>
</div>
@endsection