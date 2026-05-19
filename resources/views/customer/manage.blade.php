@extends('layouts.user.HeaFoot')

@section('title', 'Pesanan Saya - Polije Mart')

@section('content')

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pesanan Saya</h1>
            <p class="text-sm text-slate-500 mt-2 font-medium">Pantau status transaksi dan jadwal pengambilan barang Anda di sini.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-[#1C4E80] text-white">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NO</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">TANGGAL PESAN</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NO. PESANAN</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">DETAIL BARANG</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">TOTAL BAYAR</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">STATUS</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">BATAS DIAMBIL</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100">
                    @forelse($orders as $item)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="p-4 text-center font-medium">{{ $orders->firstItem() + $loop->index }}</td>
                        
                        <td class="p-4 text-sm">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                        <td class="p-4 text-center font-medium">{{ $item->nomor_pesanan ?? '-' }}</td>
                        
                        <td class="p-4 text-sm">
                            @foreach($item->detail_penjualans as $detail)
                                <div class="font-bold text-slate-800">
                                    {{ $detail->barang?->nama_barang ?? 'Produk Telah Dihapus' }}
                                    <span class="text-xs text-slate-400 font-normal">x{{ $detail->jumlah }}</span>
                                </div>
                            @endforeach
                        </td>
                        
                        <td class="p-4 font-bold text-[#069BC0]">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        
                        <td class="p-4 text-center">
                            @if($item->status == 'proses')
                                <span class="bg-orange-50 text-orange-600 border border-orange-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide uppercase">DIPROSES</span>
                            @elseif($item->status == 'selesai')
                                <span class="bg-green-50 text-green-600 border border-green-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide uppercase">SIAP DIAMBIL</span>
                            @else
                                <span class="bg-red-50 text-red-600 border border-red-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide uppercase">BATAL</span>
                            @endif
                        </td>
                        
                        <td class="p-4 text-center">
                            @if($item->status == 'selesai' && $item->batas_waktu)
                                <span class="waktu-mundur font-mono font-bold text-red-500 bg-red-50 px-2 py-1 rounded-md border border-red-100" data-waktu="{{ \Carbon\Carbon::parse($item->batas_waktu)->format('Y-m-d\TH:i:s') }}">
                                    Menghitung...
                                </span>
                            @elseif($item->status == 'proses')
                                <span class="text-slate-400 text-xs italic font-medium">Menunggu admin</span>
                            @else
                                <span class="text-slate-300 font-bold">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-10 text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" class="text-slate-300" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4"/></svg>
                                <span class="font-medium">Belum ada pesanan saat ini.</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($orders->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
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