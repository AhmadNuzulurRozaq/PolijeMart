<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;

new class extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function with(): array
    {
        return [
            'kategori' => Kategori::when($this->search, function ($query) {
                $query->where('kode_kategori', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_kategori', 'like', '%' . $this->search . '%');
            })->paginate(10),
            'total' => Kategori::count(),
        ];
    }
};
?>

<div class="w-full max-w-7xl mx-auto">
    @if(session('status'))
        <div id="alert-status" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-green-800 border border-green-200 rounded-xl bg-green-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m10 16.4l-4-4L7.4 11l2.6 2.6L16.6 7L18 8.4z"/></svg>
                {{ session('status') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-status').style.display='none'" class="text-green-600 hover:text-green-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-status');
                if (alert) {
                    alert.classList.add('opacity-0');
                    setTimeout(() => alert.remove(), 500); // Menghapus elemen setelah animasi transisi fade-out selesai
                }
            }, 3000); // Memulai animasi menghilang setelah 1000 milidetik (1 detik)
        </script>
    @endif

    @if(session('error'))
        <div id="alert-error" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-red-800 border border-red-200 rounded-xl bg-red-50 shadow-sm transition-opacity duration-500 ease-in-out">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                {{ session('error') }}
            </div>
            <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="text-red-600 hover:text-red-800 focus:outline-none transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-error');
                if (alert) {
                    alert.classList.add('opacity-0');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000); // Waktu di set 5 detik (5000ms) agar admin punya cukup waktu membaca error
        </script>
    @endif

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-extrabold text-2xl text-slate-800 tracking-tight">KELOLA KATEGORI</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">Total: <span class="text-[#1C4E80] font-bold">{{ $total }}</span> Kategori</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl outline-none focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all text-sm" placeholder="Cari kategori..." required>
            </div>
            
            <a href="{{ route('admin.addCategory') }}" class="w-full sm:w-auto bg-[#15C11B] py-2.5 px-4 text-white rounded-xl hover:bg-[#12a617] active:bg-[#0f8f14] transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5 flex items-center justify-center gap-2 font-semibold text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" /></svg>
                <span>TAMBAH</span>
            </a>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-[#1C4E80] text-white">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide w-16 text-center">NO</th>
                        <th class="p-4 text-sm font-semibold tracking-wide w-16 text-center">KODE KATEGORI</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">NAMA KATEGORI</th>
                        <th class="p-4 text-sm font-semibold tracking-wide w-48 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100">
                    @forelse($kategori as $item)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="p-4 text-center font-medium">{{ $kategori->firstItem() + $loop->index }}</td>
                        <td class="p-4 font-medium text-center">{{ $item->kode_kategori }}</td>
                        <td class="p-4 font-medium">{{ $item->nama_kategori }}</td>
                        <td class="p-4">
                            <div class="flex justify-center items-center gap-2">
                                <a href="{{ route('admin.editCategory', $item->id) }}" class="bg-[#0091D5] flex gap-1.5 px-3 py-2 items-center hover:bg-[#007cb5] transition-all rounded-lg text-white cursor-pointer shadow-sm hover:shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" /></svg>
                                    <span class="font-medium text-sm">Edit</span>
                                </a>
                                <form action="{{ route('admin.destroyCategory', $item->id) }}" method="POST" class="inline-block form-delete">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 flex gap-1.5 px-3 py-2 items-center hover:bg-red-600 transition-all rounded-lg text-white cursor-pointer shadow-sm hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="currentColor"><path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd" /><path d="M9 9h2v8H9zm4 0h2v8h-2z" /></g></svg>
                                        <span class="font-medium text-sm">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center p-8 text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" class="text-slate-300" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 0 0-2 2v4m18-4a2 2 0 0 0-2-2h-4M9 21H5a2 2 0 0 1-2-2v-4m18 4a2 2 0 0 1-2 2h-4M10 10l4 4m0-4l-4 4"/></svg>
                                <span class="font-medium">Kategori tidak ditemukan</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        @if($kategori->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $kategori->links() }}
        </div>
        @endif
    </div>
</div>