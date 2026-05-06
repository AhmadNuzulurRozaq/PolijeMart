<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penjualan;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch(){

        $this->resetPage();
    }

    public function selesaikanPesanan($id){
        $order = Penjualan::find($id);

        if ($order && $order->status == 'proses') {
            $order->update([
                'status' => 'selesai',
            ]);
        }
    }

    public function hapusPesanan($id){
        $order = Penjualan::find($id);

        if ($order && in_array($order->status, ['selesai', 'batal'])) {
            $order->delete();
        }
    }

    public function with(): array
    {
        $expiredOrder = Penjualan::where('status', 'proses')
                        ->where('batas_waktu', '<', \Carbon\Carbon::now())
                        ->get();

        foreach ($expiredOrder as $order) {
            $order->update([
                'status' => 'batal',
            ]);
        }

        return [
            'penjualan' => Penjualan::with('user')->when($this->search, function($query){
                $query->whereHas('user', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })->paginate(10),
            
            'total' => Penjualan::count(),
        ];
    }

};
?>

<div class="w-full max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-extrabold text-2xl text-slate-800 tracking-tight">MANAGE ORDER</h1>
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

    <!-- Table Section -->
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
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="p-4 text-center font-medium">{{ $penjualan->firstItem() + $loop->index }}</td>
                        <td class="p-4 font-bold text-slate-800">{{ $item->user->name ?? 'User Dihapus' }}</td>
                        <td class="p-4 text-sm">{{ \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d M Y, H:i') }}</td>
                        <td class="p-4 font-bold text-[#1C4E80]">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        <td class="p-4 text-center">
                            @if($item->status == 'proses')
                                <span class="bg-orange-50 text-orange-600 border border-orange-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide">DIPROSES</span>
                            @elseif($item->status == 'selesai')
                                <span class="bg-green-50 text-green-600 border border-green-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide">SELESAI</span>
                            @else
                                <span class="bg-red-50 text-red-600 border border-red-200 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide">BATAL</span>
                            @endif
                        </td>
                        
                        <td class="p-4 text-center">
                            @if($item->status == 'proses')
                                <span class="waktu-mundur font-mono font-bold text-red-500 bg-red-50 px-2 py-1 rounded-md" data-waktu="{{ $item->batas_waktu }}">Menghitung...</span>
                            @else
                                <span class="text-slate-400 font-bold">-</span>
                            @endif
                        </td>
                        
                        <td class="p-4">
                            <div class="flex justify-center">
                                @if($item->status == 'proses')
                                    <button type="button" wire:click="selesaikanPesanan({{ $item->id }})" wire:confirm="Apakah pesanan ini sudah diambil dan ingin diselesaikan?" class="bg-green-500 flex gap-2 px-3 py-2 items-center justify-center hover:bg-green-600 active:bg-green-700 transition-all rounded-xl text-white font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0-18M1 12C1 5.925 5.925 1 12 1s11 4.925 11 11s-4.925 11-11 11S1 18.075 1 12"/><path d="m17.608 9l-7.726 7.726L6 12.093l1.511-1.31l2.476 3.01l6.207-6.207z"/></g></svg>
                                        Selesai
                                    </button>
                                @else
                                <button type="button" wire:click="hapusPesanan({{ $item->id }})" wire:confirm="Apakah Anda yakin ingin menghapus data pesanan ini?" class="bg-red-500 flex gap-1 p-2 items-center hover:bg-red-600 transition-all rounded-lg text-white shadow-sm hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="currentColor"><path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd" /><path d="M9 9h2v8H9zm4 0h2v8h-2z" /></g></svg>
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
        
        <!-- Pagination -->
        @if($penjualan->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $penjualan->links() }}
        </div>
        @endif
    </div>

    <!-- Script Countdown Timer -->
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