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

    public function with(): array
    {
        return [
            'penjualan' => Penjualan::with('user')->when($this->search, function($query){
                $query->whereHas('user', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })->paginate(10),

            'expiredOrder' = Penjualan::where('status', 'proses')
                                        ->where('batas_waktu', '<', Carbon::now())
                                        ->get();

            'total' => Penjualan::count(),
        ];

        foreach ()
    }

};
?>

<div>
    <div class="w-4/5 mx-auto">
        <div class="flex justify-between mt-10">
            <div>
                <h1 class="font-bold text-3xl">MANAGE ORDER</h1>
                <span class="text-xl font-semibold">TOTAL : {{ $total }} ORDER</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="">
                    <input type="text" wire:model.live="search" class="p-2 border-3 outline-none border-gray-300 hover:border-blue-400 active:border-blue-600 focus:border-blue-500 rounded-lg transition-colors" placeholder="Search..." required>
                </div>
            </div>
        </div>
    </div>

    <div class="w-4/5 mx-auto rounded-lg my-5 overflow-x-auto shadow-xl">
        <table class="w-full text-white">
            <thead class="bg-[#1C4E80]">
                <tr>
                    <td class="p-4 font-bold">NO</td>
                    <td class="p-4 font-bold">NAMA PEMBELI</td>
                    <td class="p-4 font-bold">TANGGAL BELI</td>
                    <td class="p-4 font-bold">TOTAL</td>
                    <td class="p-4 font-bold">STATUS</td>
                    <td class="p-4 font-bold">BATAS PENGAMBILAN</td>
                    <td class="p-4 font-bold">AKSI</td>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse($penjualan as $item)
                <tr class="border-b border-gray-300 hover:bg-gray-50 transition-colors p-5">
                    <td class="p-4">{{ $penjualan->firstItem() + $loop->index }}</td>
                    <td class="p-4">{{ $item->user->name ?? 'User Tidak Ditemukan' }}</td>
                    <td class="p-4">{{ \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d-m-Y') }}</td>
                    <td class="p-4">Rp.{{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                    <td class="p-4">
                        @if($item->status == 'proses')
                            <span class="bg-orange-100 text-orange-800 border border-orange-300 p-1 rounded-md font-semibold">DIPROSES</span>
                        @else
                            <span class="bg-green-100 text-green-800 border border-green-300 p-1 rounded-md font-semibold">SELESAI</span>
                        @endif
                    </td>
                    <td class="p-4">{{ $item->batas_waktu }}</td>
                    
                    
                    <td class="px-4 ">
                    
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-4 font-bold text-xl">TIDAK ADA ORDER YANG TERSEDIA</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $penjualan->links() }}
        </div>
    </div>
</div>