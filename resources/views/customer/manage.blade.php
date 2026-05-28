@extends('layouts.user.HeaFoot')

@section('title', 'Pesanan Saya - Polije Mart')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-10">
        <span class="text-xs font-extrabold text-secondary-500 uppercase tracking-[0.2em] block mb-2">Riwayat Belanja</span>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Pesanan Saya</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Pantau status transaksi dan jadwal pengambilan barang Anda di sini secara real-time.</p>
    </div>

    <div class="bg-white rounded-[2rem] shadow-premium border border-slate-100/80 overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap border-collapse">
                <thead class="bg-primary-950 text-slate-200 border-b border-slate-800">
                    <tr>
                        <th class="p-5 text-xs font-extrabold tracking-wider text-center uppercase">NO</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider uppercase">TANGGAL PESAN</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider text-center uppercase">NO. PESANAN</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider uppercase">DETAIL BARANG</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider uppercase">TOTAL BAYAR</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider text-center uppercase">STATUS</th>
                        <th class="p-5 text-xs font-extrabold tracking-wider text-center uppercase">BATAS DIAMBIL</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100">
                    @forelse($orders as $item)
                    <tr class="hover:bg-slate-50/75 transition-colors">
                        <td class="p-5 text-center font-bold text-slate-400 text-sm">{{ $orders->firstItem() + $loop->index }}</td>
                        
                        <td class="p-5 text-sm font-semibold text-slate-650">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                        <td class="p-5 text-center font-mono font-bold text-sm text-primary-750">{{ $item->nomor_pesanan ?? '-' }}</td>
                        
                        <td class="p-5 text-sm">
                            @foreach($item->detail_penjualans as $detail)
                                <div class="font-bold text-slate-800 leading-snug py-1">
                                    {{ $detail->barang?->nama_barang ?? 'Produk Telah Dihapus' }}
                                    <span class="text-xs text-slate-400 font-semibold ml-1">x{{ $detail->jumlah }}</span>
                                </div>
                            @endforeach
                        </td>
                        
                        <td class="p-5 font-black text-secondary-650 text-base">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        
                        <td class="p-5 text-center">
                            @if($item->status == 'proses')
                                <span class="bg-amber-50 text-amber-600 border border-amber-200/60 px-3.5 py-1.5 rounded-full text-[10px] font-black tracking-wider uppercase inline-block shadow-sm">DIPROSES</span>
                            @elseif($item->status == 'selesai')
                                <span class="bg-emerald-50 text-emerald-600 border border-emerald-250/60 px-3.5 py-1.5 rounded-full text-[10px] font-black tracking-wider uppercase inline-block shadow-sm">SIAP DIAMBIL</span>
                            @else
                                <span class="bg-rose-50 text-rose-600 border border-rose-200/60 px-3.5 py-1.5 rounded-full text-[10px] font-black tracking-wider uppercase inline-block shadow-sm">BATAL</span>
                            @endif
                        </td>
                        
                        <td class="p-5 text-center">
                            @if($item->status == 'selesai' && $item->batas_waktu)
                                <span class="waktu-mundur font-mono font-black text-xs text-red-500 bg-red-50 px-3 py-1.5 rounded-xl border border-red-100 shadow-sm inline-flex items-center gap-1.5" data-waktu="{{ \Carbon\Carbon::parse($item->batas_waktu)->format('Y-m-d\TH:i:s') }}">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-ping"></span>
                                    Menghitung...
                                </span>
                            @elseif($item->status == 'proses')
                                <span class="text-slate-450 text-xs italic font-semibold">Menunggu diproses</span>
                            @else
                                <span class="text-slate-300 font-bold">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-16 text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="w-14 h-14 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center shadow-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="text-slate-350" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4"/></svg>
                                </div>
                                <span class="font-bold text-slate-400 text-sm">Belum ada transaksi pembelian saat ini.</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($orders->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>

<script>
    setInterval(function() {
        const timers = document.querySelectorAll('.waktu-mundur');
        
        timers.forEach(timer => {
            const countDownDate = new Date(timer.getAttribute('data-waktu')).getTime();
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance < 0) {
                timer.innerHTML = "WAKTU HABIS";
                timer.classList.replace('text-red-500', 'text-slate-500');
                timer.classList.replace('bg-red-50', 'bg-slate-100');
                timer.classList.replace('border-red-100', 'border-slate-200');
            } else {
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                const formatNum = (num) => String(num).padStart(2, '0');
                timer.innerHTML = `${formatNum(hours)}:${formatNum(minutes)}:${formatNum(seconds)}`;
            }
        });
    }, 1000);
</script>

@endsection