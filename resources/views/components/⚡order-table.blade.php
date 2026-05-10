<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penjualan;
use App\Models\Barang;
use Carbon\Carbon;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function selesaikanPesanan($id){
        $order = Penjualan::with('detail_penjualans')->find($id);

        if ($order && $order->status == 'proses') {

            foreach ($order->detail_penjualans as $detail) {
                $barang = Barang::find($detail->barang_id);

                if($barang){
                    $barang->decrement('stok', $detail->jumlah);
                }
            }

            $order->update([
                'status' => 'selesai',
                'batas_waktu' => now()->addHours(24), // Perbaikan: addHours pakai 's'
            ]);
        }
    }

    public function hapusPesanan($id){
        $order = Penjualan::find($id);

        if ($order && in_array($order->status, ['selesai', 'batal'])) {
            // Hapus detail penjualan terlebih dahulu untuk menghindari Foreign Key constraint error
            $order->detail_penjualans()->delete();
            
            $order->delete();
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
                'batas_waktu' => null, // Reset batas waktu
            ]);
        }

        return [
            'penjualan' => Penjualan::with('user')->when($this->search, function($query){
                $query->whereHas('user', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })->latest()->paginate(10),
            
            'total' => Penjualan::count(),
        ];
    }

};
?>

<div class="w-full max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-extrabold text-2xl text-slate-800 tracking-tight">KELOLA PESANAN</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">Total: <span class="text-[#1C4E80] font-bold">{{ $total }}</span> Pesanan</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl outline-none focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all text-sm" placeholder="Cari nama pembeli..." required>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-[#1C4E80] text-white">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NO</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">NAMA PEMBELI</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">TANGGAL</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">TOTAL BELANJA</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">STATUS</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">BATAS AMBIL</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100">
                    @forelse($penjualan as $item)
                    <tr wire:key="order-{{ $item->id }}" class="hover:bg-slate-50 transition-colors group">
                        <td class="p-4 text-center font-medium">{{ $penjualan->firstItem() + $loop->index }}</td>
                        <td class="p-4 font-bold text-slate-800">{{ $item->user->name ?? 'User Dihapus' }}</td>
                        <td class="p-4 text-sm">{{ \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d M Y, H:i') }}</td>
                        <td class="p-4 font-bold text-[#1C4E80]">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
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
                                <span class="waktu-mundur font-mono font-bold text-red-500 bg-red-50 px-2 py-1 rounded-md" data-waktu="{{ \Carbon\Carbon::parse($item->batas_waktu)->format('Y-m-d\TH:i:s') }}">Menghitung...</span>
                            @elseif($item->status == 'proses')
                                <span class="text-slate-400 text-xs italic">Menunggu diproses</span>
                            @else
                                <span class="text-slate-300 font-bold">-</span>
                            @endif
                        </td>
                        
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                
                                @if($item->status == 'proses')
                                    <button type="button" @click="
                                        Swal.fire({
                                            title: 'Selesaikan Pesanan?',
                                            text: 'Apakah pesanan ini sudah siap diambil untuk diselesaikan?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#22c55e',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, Selesaikan!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                $wire.selesaikanPesanan({{ $item->id }});
                                            }
                                        })
                                    " class="bg-green-500 flex gap-2 px-3 py-2 items-center justify-center hover:bg-green-600 active:bg-green-700 transition-all rounded-xl text-white font-semibold shadow-sm hover:-translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </button>
                                @endif

                                @if(in_array($item->status, ['selesai', 'batal']))
                                    <button type="button" @click="
                                        Swal.fire({
                                            title: 'Apakah Anda yakin?',
                                            text: 'Data pesanan yang dihapus tidak dapat dikembalikan!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Ya, Hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                $wire.hapusPesanan({{ $item->id }});
                                            }
                                        })
                                    " class="bg-red-500 flex gap-1 p-2 items-center hover:bg-red-600 transition-all rounded-lg text-white shadow-sm hover:-translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><g fill="currentColor"><path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd" /><path d="M9 9h2v8H9zm4 0h2v8h-2z" /></g></svg>
                                    </button>
                                @endif
                                
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-8 text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" class="text-slate-300" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4"/></svg>
                                <span class="font-medium">Tidak ada order yang masuk saat ini</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($penjualan->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
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
                    timer.classList.replace('text-red-500', 'text-slate-500');
                    timer.classList.replace('bg-red-50', 'bg-slate-100');
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