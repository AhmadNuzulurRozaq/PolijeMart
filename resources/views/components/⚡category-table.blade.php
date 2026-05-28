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

<div class="w-full max-w-7xl mx-auto px-1 fade-in-up">
    @if(session('status'))
        <div id="alert-status" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-emerald-800 border border-emerald-100 rounded-2xl bg-emerald-50/80 backdrop-blur-md shadow-premium transition-all duration-500 ease-in-out">
            <div class="flex items-center gap-2.5">
                <div class="p-1 bg-emerald-500 text-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </div>
                <span>{{ session('status') }}</span>
            </div>
            <button type="button" onclick="document.getElementById('alert-status').style.display='none'" class="text-emerald-600 hover:text-emerald-800 focus:outline-none transition-colors p-1 hover:bg-emerald-100 rounded-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-status');
                if (alert) {
                    alert.classList.add('opacity-0', 'translate-y-[-10px]');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if(session('error'))
        <div id="alert-error" class="mb-6 flex items-center justify-between p-4 text-sm font-semibold text-rose-800 border border-rose-100 rounded-2xl bg-rose-50/80 backdrop-blur-md shadow-premium transition-all duration-500 ease-in-out">
            <div class="flex items-center gap-2.5">
                <div class="p-1 bg-rose-500 text-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                </div>
                <span>{{ session('error') }}</span>
            </div>
            <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="text-rose-600 hover:text-rose-800 focus:outline-none transition-colors p-1 hover:bg-rose-100 rounded-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('alert-error');
                if (alert) {
                    alert.classList.add('opacity-0', 'translate-y-[-10px]');
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    @endif

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-800 bg-clip-text text-transparent uppercase">Kelola Kategori</h1>
            <p class="text-sm text-slate-500 mt-1.5 font-medium flex items-center gap-2">
                <span>Kelompokkan produk sesuai kategori</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-extrabold bg-primary-50 text-primary-700 border border-primary-100">{{ $total }} Kategori</span>
            </p>
        </div>
        
        <!-- Controls: Search & Add button inside glass panel -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto bg-white/70 backdrop-blur p-2.5 rounded-2xl border border-slate-200/50 shadow-sm">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-slate-50/50 border border-slate-200/80 rounded-xl outline-none focus:border-secondary-500 focus:bg-white focus:ring-4 focus:ring-secondary-500/10 hover:border-slate-350 transition-all text-sm font-medium text-slate-800 placeholder-slate-400" placeholder="Cari kategori...">
            </div>
            
            <a href="{{ route('admin.addCategory') }}" class="w-full sm:w-auto bg-gradient-to-r from-secondary-700 to-secondary-500 py-2.5 px-5 text-white rounded-xl hover:brightness-105 active:scale-[0.98] transition-all duration-200 shadow-md shadow-secondary-500/25 flex items-center justify-center gap-2 font-bold text-sm cursor-pointer tracking-wider">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span>TAMBAH KATEGORI</span>
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-premium border border-slate-100 overflow-hidden mb-8">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-white uppercase text-[11px] font-black tracking-wider" style="background-image: linear-gradient(to right, #0a1b30, #112e4d);">
                        <th class="p-4.5 text-center w-20">NO</th>
                        <th class="p-4.5 text-center w-36">KODE KATEGORI</th>
                        <th class="p-4.5">NAMA KATEGORI</th>
                        <th class="p-4.5 text-center w-52">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-650 divide-y divide-slate-100/70 text-sm">
                    @forelse($kategori as $item)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-4 text-center font-bold text-slate-400">{{ $kategori->firstItem() + $loop->index }}</td>
                        <td class="p-4 text-center">
                            <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-lg text-xs font-mono font-extrabold border border-slate-200/50 tracking-wide">{{ $item->kode_kategori }}</span>
                        </td>
                        <td class="p-4 font-extrabold text-slate-800 group-hover:text-primary-800 transition-colors">{{ $item->nama_kategori }}</td>
                        <td class="p-4">
                            <div class="flex justify-center items-center gap-2.5">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.editCategory', $item->id) }}" class="bg-slate-50 text-[#0091D5] hover:bg-[#0091D5] hover:text-white px-3.5 py-2 border border-slate-200/80 hover:border-[#0091D5] transition-all duration-200 rounded-xl shadow-sm hover:shadow flex items-center gap-1.5 font-bold text-xs cursor-pointer active:scale-95">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"></path></svg>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete Button with SweetAlert confirmation -->
                                <form action="{{ route('admin.destroyCategory', $item->id) }}" method="POST" class="inline-block form-delete">
                                    @csrf
                                    @method('delete')
                                    <button type="button" @click="
                                        let form = $el.closest('form');
                                        Swal.fire({
                                            title: 'Hapus Kategori?',
                                            text: 'Menghapus kategori juga dapat memengaruhi filter produk terkait!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#ef4444',
                                            cancelButtonColor: '#64748b',
                                            confirmButtonText: 'Ya, Hapus!',
                                            cancelButtonText: 'Batal'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                form.submit();
                                            }
                                        })
                                    " class="bg-slate-50 text-red-500 hover:bg-red-500 hover:text-white px-3.5 py-2 border border-slate-200/80 hover:border-red-500 transition-all duration-200 rounded-xl shadow-sm hover:shadow flex items-center gap-1.5 font-bold text-xs cursor-pointer active:scale-95">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <!-- BUG FIXED: colspan disesuaikan dari 3 menjadi 4 agar memenuhi lebar tabel -->
                        <td colspan="4" class="text-center py-14 text-slate-400 bg-slate-50/20">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="p-3.5 bg-slate-100 rounded-full border border-slate-200/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                </div>
                                <span class="font-bold text-slate-550">Kategori kosong atau tidak ditemukan</span>
                                <p class="text-xs text-slate-400 max-w-sm leading-relaxed">Coba ubah pencarian atau buat kategori produk baru sekarang.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($kategori->hasPages())
        <div class="p-5 border-t border-slate-100 bg-slate-50/50">
            {{ $kategori->links() }}
        </div>
        @endif
    </div>
</div>
</div>