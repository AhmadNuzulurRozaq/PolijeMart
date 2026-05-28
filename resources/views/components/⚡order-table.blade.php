<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penjualan;
use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function selesaikanPesanan($id){
        try {
            $order = Penjualan::with(['detail_penjualans', 'user'])->find($id);

            if ($order && $order->status == 'proses') {

                // Cek terlebih dahulu apakah semua stok barang mencukupi
                foreach ($order->detail_penjualans as $detail) {
                    $barang = Barang::find($detail->barang_id);
                    if($barang && $barang->stok < $detail->jumlah) {
                        session()->flash('error', 'Stok barang ' . $barang->nama_barang . ' tidak mencukupi untuk diselesaikan!');
                        return;
                    }
                }

                // Jika stok cukup semua, baru kurangi stoknya
                foreach ($order->detail_penjualans as $detail) {
                    $barang = Barang::find($detail->barang_id);

                    if($barang){
                        $barang->decrement('stok', $detail->jumlah);
                    }
                }

                $order->update([
                    'status' => 'selesai',
                    'batas_waktu' => now()->addHours(24), 
                ]);

                if ($order->user && $order->user->email) {
                    Mail::to($order->user->email)->send(new OrderStatusMail($order, 'selesai'));
                }

                session()->flash('status', 'Pesanan berhasil diselesaikan dan email telah dikirim!');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function batalkanPesanan($id){
        try {
            $order = Penjualan::with(['detail_penjualans', 'user'])->find($id);

            if ($order && $order->status == 'selesai') {
                // Kembalikan stok barang
                foreach ($order->detail_penjualans as $detail) {
                    $barang = Barang::find($detail->barang_id);
                    if($barang){
                        $barang->increment('stok', $detail->jumlah);
                    }
                }

                $order->update([
                    'status' => 'batal',
                    // 'batas_waktu' => null, // Dikomentari untuk mencegah Error Database constraint null
                ]);

                if ($order->user && $order->user->email) {
                    Mail::to($order->user->email)->send(new OrderStatusMail($order, 'batal'));
                }

                session()->flash('status', 'Pesanan berhasil dibatalkan, stok dikembalikan, dan email telah dikirim!');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal membatalkan: ' . $e->getMessage());
        }
    }

    public function hapusPesanan($id){
        try {
            $order = Penjualan::find($id);

            if ($order && in_array($order->status, ['selesai', 'batal'])) {
                $order->detail_penjualans()->delete();
                $order->delete();
                
                session()->flash('status', 'Pesanan berhasil dihapus secara permanen!');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }

    public function with(): array
    {
        // Perbaikan: Ubah 'proses' menjadi 'selesai'
        $expiredOrder = Penjualan::with('detail_penjualans')
                        ->where('status', 'selesai') 
                        ->whereNotNull('batas_waktu')
                        ->where('batas_waktu', '<', Carbon::now())
                        ->get();

        foreach ($expiredOrder as $order) {
            
            foreach ($order->detail_penjualans as $detail){
                $barang = Barang::find($detail->barang_id);

                if($barang){
                    $barang->increment('stok', $detail->jumlah);
                }
            }

            $order->update([
                'status' => 'batal',
            ]);
        }

        return [
            'penjualan' => Penjualan::with(['user', 'detail_penjualans.barang'])->when($this->search, function($query){
                $query->whereHas('user', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })->latest()->paginate(10),
            
            'total' => Penjualan::count(),
        ];
    }

};
?>

<div class="w-full max-w-7xl mx-auto px-1 fade-in-up">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-800 bg-clip-text text-transparent uppercase">Kelola Pesanan</h1>
            <p class="text-sm text-slate-500 mt-1.5 font-medium flex items-center gap-2">
                <span>Daftar pesanan dari pelanggan</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-extrabold bg-primary-50 text-primary-700 border border-primary-100">{{ $total }} Pesanan</span>
            </p>
        </div>
        
        <!-- Controls: Search inside glass panel -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto bg-white/70 backdrop-blur p-2.5 rounded-2xl border border-slate-200/50 shadow-sm">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-slate-50/50 border border-slate-200/80 rounded-xl outline-none focus:border-secondary-500 focus:bg-white focus:ring-4 focus:ring-secondary-500/10 hover:border-slate-350 transition-all text-sm font-medium text-slate-800 placeholder-slate-400" placeholder="Cari nama pembeli...">
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if(session()->has('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3500)" x-transition.duration.500ms class="mb-6 bg-emerald-50/80 backdrop-blur border border-emerald-100 px-4 py-3.5 rounded-2xl flex items-center gap-3 shadow-premium text-emerald-800 text-sm font-semibold">
            <div class="p-1 bg-emerald-500 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <span>{{ session('status') }}</span>
        </div>
    @endif
    
    @if(session()->has('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3500)" x-transition.duration.500ms class="mb-6 bg-rose-50/80 backdrop-blur border border-rose-100 px-4 py-3.5 rounded-2xl flex items-center gap-3 shadow-premium text-rose-800 text-sm font-semibold">
            <div class="p-1 bg-rose-500 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            </div>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-premium border border-slate-100 overflow-hidden mb-8">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-white uppercase text-[10px] font-black tracking-wider whitespace-nowrap" style="background-image: linear-gradient(to right, #0a1b30, #112e4d);">
                        <th class="p-4.5 text-center w-14">NO</th>
                        <th class="p-4.5">NO. PESANAN</th>
                        <th class="p-4.5">NAMA PEMBELI</th>
                        <th class="p-4.5">NO. TELEPON</th>
                        <th class="p-4.5">TANGGAL</th>
                        <th class="p-4.5">DETAIL BARANG</th>
                        <th class="p-4.5">TOTAL BELANJA</th>
                        <th class="p-4.5 text-center">STATUS</th>
                        <th class="p-4.5 text-center">BATAS AMBIL</th>
                        <th class="p-4.5 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-650 divide-y divide-slate-100/70 text-sm whitespace-nowrap">
                    @forelse($penjualan as $item)
                    <tr wire:key="order-{{ $item->id }}" class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-4 text-center font-bold text-slate-400">{{ $penjualan->firstItem() + $loop->index }}</td>
                        <td class="p-4">
                            <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-lg text-xs font-mono font-extrabold border border-slate-200/50 tracking-wide">{{ $item->nomor_pesanan ?? '-' }}</span>
                        </td>
                        <td class="p-4 font-extrabold text-slate-800">{{ $item->user->name ?? 'User Dihapus' }}</td>
                        <td class="p-4 font-semibold text-slate-500 text-xs">{{ $item->user->nomor_telepon ?? '-' }}</td>
                        <td class="p-4 text-slate-500 text-xs font-semibold">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                        <td class="p-4 text-xs font-medium max-w-[240px] truncate">
                            <div class="flex flex-col gap-1">
                                @foreach($item->detail_penjualans as $detail)
                                    <div class="text-slate-800 font-bold flex items-center gap-1.5">
                                        <span class="inline-block w-1.5 h-1.5 bg-secondary-500 rounded-full shrink-0"></span>
                                        <span class="truncate block max-w-[150px]">{{ $detail->barang?->nama_barang ?? 'Produk Dihapus' }}</span>
                                        <span class="text-[10px] bg-slate-100 text-slate-500 font-extrabold px-1.5 py-0.5 rounded">x{{ $detail->jumlah }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-4 font-black text-slate-800">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        <td class="p-4 text-center">
                            @if($item->status == 'proses')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-black bg-amber-50 text-amber-600 border border-amber-100/70 select-none uppercase tracking-wide">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                                    <span>DIPROSES</span>
                                </span>
                            @elseif($item->status == 'selesai')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-black bg-emerald-50 text-emerald-600 border border-emerald-100/70 select-none uppercase tracking-wide">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                                    <span>SIAP DIAMBIL</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-black bg-slate-100 text-slate-400 border border-slate-200 select-none uppercase tracking-wide">
                                    <span>BATAL</span>
                                </span>
                            @endif
                        </td>
                        
                        <td class="p-4 text-center">
                            @if($item->status == 'selesai' && $item->batas_waktu)
                                <span class="waktu-mundur font-mono font-bold text-xs bg-rose-50 text-rose-600 border border-rose-100 px-2.5 py-1 rounded-xl shadow-[0_2px_8px_rgba(239,68,68,0.05)]" data-waktu="{{ \Carbon\Carbon::parse($item->batas_waktu)->format('Y-m-d\TH:i:s') }}">Menghitung...</span>
                            @elseif($item->status == 'proses')
                                <span class="text-slate-400 text-xs italic font-medium">Menunggu diproses</span>
                            @else
                                <span class="text-slate-300 font-extrabold">-</span>
                            @endif
                        </td>
                        
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                @if($item->status == 'proses')
                                    <button type="button" @click="
                                        let component = $wire;
                                        Swal.fire({
                                            title: 'Selesaikan Pesanan?',
                                            text: 'Apakah pesanan ini sudah siap diambil untuk diselesaikan?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#10b981',
                                            cancelButtonColor: '#64748b',
                                            confirmButtonText: 'Ya, Selesaikan!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                component.selesaikanPesanan({{ $item->id }});
                                            }
                                        })
                                    " class="bg-slate-50 text-emerald-600 hover:bg-emerald-600 hover:text-white p-2 border border-slate-200/80 hover:border-emerald-650 transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center cursor-pointer" title="Proses Pesanan (Siap Diambil)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </button>
                                @endif

                                @if($item->status == 'selesai')
                                    <button type="button" @click="
                                        let component = $wire;
                                        Swal.fire({
                                            title: 'Batalkan Pesanan?',
                                            text: 'Pesanan ini akan dibatalkan and stok barang akan otomatis dikembalikan!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#f59e0b',
                                            cancelButtonColor: '#64748b',
                                            confirmButtonText: 'Ya, Batalkan!',
                                            cancelButtonText: 'Tidak'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                component.batalkanPesanan({{ $item->id }});
                                            }
                                        })
                                    " class="bg-slate-50 text-amber-500 hover:bg-amber-500 hover:text-white p-2 border border-slate-200/80 hover:border-amber-500 transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center cursor-pointer" title="Batalkan Pesanan">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    </button>
                                @endif

                                @if(in_array($item->status, ['selesai', 'batal']))
                                    <button type="button" @click="
                                        let component = $wire;
                                        Swal.fire({
                                            title: 'Hapus Pesanan?',
                                            text: 'Data riwayat transaksi pesanan ini akan dihapus secara permanen!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#ef4444',
                                            cancelButtonColor: '#64748b',
                                            confirmButtonText: 'Ya, Hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                component.hapusPesanan({{ $item->id }});
                                            }
                                        })
                                    " class="bg-slate-50 text-red-500 hover:bg-red-500 hover:text-white p-2 border border-slate-200/80 hover:border-red-500 transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center cursor-pointer" title="Hapus Permanen">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-14 text-slate-400 bg-slate-50/20">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="p-3.5 bg-slate-100 rounded-full border border-slate-200/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"></path><rect x="9" y="3" width="6" height="4" rx="1" ry="1"></rect><line x1="9" y1="14" x2="15" y2="14"></line></svg>
                                </div>
                                <span class="font-bold text-slate-550">Tidak ada transaksi pesanan saat ini</span>
                                <p class="text-xs text-slate-400 max-w-sm leading-relaxed">Coba ubah filter pencarian pembeli Anda atau tunggu pesanan baru masuk.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($penjualan->hasPages())
        <div class="p-5 border-t border-slate-100 bg-slate-50/50">
            {{ $penjualan->links() }}
        </div>
        @endif
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
                    timer.classList.replace('text-rose-600', 'text-slate-400');
                    timer.classList.replace('bg-rose-50', 'bg-slate-100');
                    timer.classList.remove('border-rose-100');
                    timer.classList.add('border-slate-200/50');
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
</div>