<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;

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
            'barang' => Barang::with('kategori')->when($this->search, function ($query) {
                $query->where('nama_barang', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_barang', 'like', '%' . $this->search . '%');
            })->paginate(10),
            'total' => Barang::count()
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

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight bg-gradient-to-r from-primary-950 to-primary-800 bg-clip-text text-transparent uppercase">Kelola Inventori</h1>
            <p class="text-sm text-slate-500 mt-1.5 font-medium flex items-center gap-2">
                <span>Daftar persediaan barang toko</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-extrabold bg-primary-50 text-primary-700 border border-primary-100">{{ $total }} Item</span>
            </p>
        </div>
        
        <!-- Controls: Search & Add button inside glass panel -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto bg-white/70 backdrop-blur p-2.5 rounded-2xl border border-slate-200/50 shadow-sm">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 bg-slate-50/50 border border-slate-200/80 rounded-xl outline-none focus:border-secondary-500 focus:bg-white focus:ring-4 focus:ring-secondary-500/10 hover:border-slate-350 transition-all text-sm font-medium text-slate-800 placeholder-slate-400" placeholder="Cari barang atau kode...">
            </div>
            
            <a href="{{ route('admin.addData') }}" class="w-full sm:w-auto bg-gradient-to-r from-secondary-700 to-secondary-500 py-2.5 px-5 text-white rounded-xl hover:brightness-105 active:scale-[0.98] transition-all duration-200 shadow-md shadow-secondary-500/25 flex items-center justify-center gap-2 font-bold text-sm cursor-pointer tracking-wider">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span>TAMBAH PRODUK</span>
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-premium border border-slate-100 overflow-hidden mb-8">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-white uppercase text-[11px] font-black tracking-wider" style="background-image: linear-gradient(to right, #0a1b30, #112e4d);">
                        <th class="p-4.5 text-center w-16">NO</th>
                        <th class="p-4.5">KODE</th>
                        <th class="p-4.5">NAMA PRODUK</th>
                        <th class="p-4.5">DESKRIPSI</th>
                        <th class="p-4.5 text-center">STOK</th>
                        <th class="p-4.5">KATEGORI</th>
                        <th class="p-4.5">HARGA</th>
                        <th class="p-4.5 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-650 divide-y divide-slate-100/70 text-sm">
                    @forelse($barang as $item)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="p-4 text-center font-bold text-slate-400">{{ $barang->firstItem() + $loop->index }}</td>
                        <td class="p-4">
                            <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-lg text-xs font-mono font-extrabold border border-slate-200/50 tracking-wide">{{ $item->kode_barang }}</span>
                        </td>
                        <td class="p-4 font-extrabold text-slate-800 group-hover:text-primary-800 transition-colors">{{ $item->nama_barang }}</td>
                        <td class="p-4 max-w-[200px]">
                            <span class="truncate block text-slate-500 font-medium" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</span>
                        </td>
                        <td class="p-4 text-center">
                            @if($item->stok < 5)
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-black bg-rose-50 text-rose-600 border border-rose-100 shadow-sm relative overflow-hidden select-none">
                                    <span class="w-1.5 h-1.5 bg-rose-500 rounded-full animate-ping"></span>
                                    <span>Hampir Habis ({{ $item->stok }})</span>
                                </div>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-extrabold bg-emerald-50 text-emerald-600 border border-emerald-100 select-none">
                                    {{ $item->stok }} Pcs
                                </span>
                            @endif
                        </td>
                        <td class="p-4">
                            <span class="bg-primary-50 text-primary-700 border border-primary-100/60 px-2.5 py-1 rounded-lg text-xs font-extrabold uppercase tracking-wider">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                        </td>
                        <td class="p-4 font-black text-slate-800">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="p-4">
                            <div class="flex gap-2 justify-center items-center">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.editData', $item->id) }}" class="bg-slate-50 text-[#0091D5] hover:bg-[#0091D5] hover:text-white p-2 border border-slate-200/80 hover:border-[#0091D5] transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center" title="Edit Barang">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"></path></svg>
                                </a>
                                
                                <!-- Detail Button -->
                                <button type="button" onclick="showDetailModal('{{ $item->kode_barang }}', '{{ addslashes($item->nama_barang) }}', '{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}', 'Rp {{ number_format($item->harga, 0, ',', '.') }}', '{{ $item->stok }}', '{{ addslashes(str_replace(["\r", "\n"], " ", $item->deskripsi)) }}', '{{ $item->image ? asset('storage/' . $item->image) : '' }}')" class="bg-slate-50 text-[#EA6A47] hover:bg-[#EA6A47] hover:text-white p-2 border border-slate-200/80 hover:border-[#EA6A47] transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center cursor-pointer" title="Detail Barang">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                </button>
 
                                <!-- Delete Button -->
                                <form action="{{ route('admin.destroyData', $item->id) }}" method="POST" class="inline-block form-delete">
                                    @csrf
                                    @method('delete')
                                    <button type="button" @click="
                                        let form = $el.closest('form');
                                        Swal.fire({
                                            title: 'Hapus Produk?',
                                            text: 'Anda akan menghapus produk ini dari database secara permanen!',
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
                                    " class="bg-slate-50 text-red-500 hover:bg-red-500 hover:text-white p-2 border border-slate-200/80 hover:border-red-500 transition-all duration-200 rounded-xl shadow-sm hover:shadow-md active:scale-95 flex items-center justify-center cursor-pointer" title="Hapus Barang">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-14 text-slate-400 bg-slate-50/20">
                            <div class="flex flex-col items-center justify-center gap-3">
                                <div class="p-3.5 bg-slate-100 rounded-full border border-slate-200/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                </div>
                                <span class="font-bold text-slate-550">Produk inventori kosong atau tidak ditemukan</span>
                                <p class="text-xs text-slate-400 max-w-sm leading-relaxed">Coba ubah kata kunci pencarian Anda atau tambahkan produk baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($barang->hasPages())
        <div class="p-5 border-t border-slate-100 bg-slate-50/50">
            {{ $barang->links() }}
        </div>
        @endif
    </div>

    <!-- Redesigned Ultra-Premium Modal -->
    <div wire:ignore>
        <div id="detailModal" class="fixed inset-0 z-[9999] items-center justify-center bg-slate-950/60 backdrop-blur-md transition-opacity duration-300 ease-in-out opacity-0 hidden">
            
            <div id="modalContent" class="w-[92%] md:w-[540px] max-h-[92vh] overflow-y-auto bg-white rounded-3xl shadow-2xl transition-all duration-300 ease-in-out opacity-0 scale-95 transform border border-slate-100 flex flex-col custom-scrollbar">
                
                <!-- Modal Top Header -->
                <div class="p-6 text-white flex justify-between items-center shrink-0" style="background-image: linear-gradient(to right, #0a1b30, #112e4d);">
                    <div>
                        <span class="text-[10px] bg-white/20 text-white border border-white/10 px-2 py-0.5 rounded font-extrabold uppercase tracking-widest block mb-0.5" id="modalKode"></span>
                        <h2 class="text-lg font-black tracking-wide">DETAIL SPESIFIKASI</h2>
                    </div>
                    <button type="button" onclick="closeModal()" class="text-white/80 hover:text-white transition-all p-1.5 bg-white/10 hover:bg-white/20 rounded-xl cursor-pointer hover:rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="p-6 md:p-8 space-y-6 overflow-y-auto">
                    <!-- Image Showcase Section -->
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/60 p-3 flex justify-center items-center min-h-[220px] shadow-inner relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/5 to-transparent z-10"></div>
                        <img id="modalGambar" src="" alt="Gambar Produk" class="hidden max-h-[200px] w-auto object-contain rounded-xl drop-shadow-md group-hover:scale-105 transition-transform duration-300 relative z-20">
                        <div id="noGambarText" class="text-slate-400 text-sm font-bold flex flex-col items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" class="text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <span>Gambar tidak tersedia</span>
                        </div>
                    </div>

                    <!-- Details Fields Grid -->
                    <div class="space-y-4">
                        <div class="pb-3.5 border-b border-slate-100 flex justify-between items-start gap-4">
                            <div>
                                <span class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider block">Nama Produk</span>
                                <h3 id="modalNama" class="font-extrabold text-slate-800 text-lg leading-tight mt-0.5"></h3>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pb-3.5 border-b border-slate-100">
                            <div>
                                <span class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider block">Kategori</span>
                                <span id="modalKategori" class="inline-block mt-1 bg-primary-50 text-primary-700 border border-primary-100/50 px-2.5 py-0.5 rounded text-xs font-black uppercase"></span>
                            </div>
                            <div>
                                <span class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider block">Stok Tersedia</span>
                                <span id="modalStok" class="inline-block mt-1 font-extrabold text-sm text-slate-800"></span>
                            </div>
                        </div>

                        <div class="pb-3.5 border-b border-slate-100">
                            <span class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider block">Harga Jual</span>
                            <h4 id="modalHarga" class="font-black text-xl text-secondary-600 mt-1 leading-none"></h4>
                        </div>

                        <div>
                            <span class="text-[11px] text-slate-400 font-extrabold uppercase tracking-wider block mb-1">Deskripsi</span>
                            <p id="modalDeskripsi" class="text-xs text-slate-500 font-medium leading-relaxed bg-slate-50 p-3.5 rounded-2xl border border-slate-100/80"></p>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 bg-slate-50 border-t border-slate-100 flex gap-3 shrink-0">
                    <button type="button" onclick="closeModal()" class="w-full px-5 py-3 text-white font-extrabold bg-slate-800 hover:bg-slate-700 active:bg-slate-900 rounded-xl transition-all shadow-md active:scale-[0.98] cursor-pointer tracking-wider text-xs uppercase">
                        Tutup Detail
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const detailModal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');
        const imgElement = document.getElementById('modalGambar');
        const noImgText = document.getElementById('noGambarText');

        document.addEventListener("DOMContentLoaded", () => {
            if (detailModal && detailModal.parentNode !== document.body) {
                document.body.appendChild(detailModal);
            }
        });

        function showDetailModal(kode, nama, kategori, harga, stok, deskripsi, imageUrl) {
            if (detailModal.parentNode !== document.body) {
                document.body.appendChild(detailModal);
            }
            
            // Populate
            document.getElementById('modalKode').innerText = kode;
            document.getElementById('modalNama').innerText = nama;
            document.getElementById('modalKategori').innerText = kategori;
            document.getElementById('modalHarga').innerText = harga;
            document.getElementById('modalStok').innerText = stok + ' Pcs';
            document.getElementById('modalDeskripsi').innerText = deskripsi;
            
            if(imageUrl) {
                imgElement.src = imageUrl;
                imgElement.classList.remove('hidden');
                noImgText.classList.add('hidden');
            } else {
                imgElement.classList.add('hidden');
                noImgText.classList.remove('hidden');
            }

            // Animate In
            detailModal.classList.remove('hidden');
            detailModal.classList.add('flex');
            
            setTimeout(() => {
                detailModal.classList.remove('opacity-0');
                modalContent.classList.remove('opacity-0', 'scale-95');
            }, 10);
        }

        function closeModal() {
            detailModal.classList.add('opacity-0');
            modalContent.classList.add('opacity-0', 'scale-95');
            
            setTimeout(() => {
                detailModal.classList.add('hidden');
                detailModal.classList.remove('flex');
            }, 300);
        }

        detailModal.addEventListener('click', function(e) {
            if(e.target === detailModal) {
                closeModal();
            }
        });
    </script>
</div>