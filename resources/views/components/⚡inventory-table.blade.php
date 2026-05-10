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
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="font-extrabold text-2xl text-slate-800 tracking-tight">KELOLA INVENTORI</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">Total: <span class="text-[#1C4E80] font-bold">{{ $total }}</span> Item</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                </div>
                <input type="text" wire:model.live="search" class="w-full sm:w-64 pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl outline-none focus:border-[#1C4E80] focus:ring-2 focus:ring-[#1C4E80]/20 transition-all text-sm" placeholder="Cari barang atau kode..." required>
            </div>
            
            <a href="{{ route('admin.addData') }}" class="w-full sm:w-auto bg-[#15C11B] py-2.5 px-4 text-white rounded-xl hover:bg-[#12a617] active:bg-[#0f8f14] transition-all duration-300 shadow-sm hover:shadow-md hover:-translate-y-0.5 flex items-center justify-center gap-2 font-semibold text-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" /></svg>
                <span>TAMBAH PRODUK</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-[#1C4E80] text-white">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">NO</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">KODE</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">NAMA</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">DESKRIPSI</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">STOK</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">KATEGORI</th>
                        <th class="p-4 text-sm font-semibold tracking-wide">HARGA</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 divide-y divide-slate-100">
                    @forelse($barang as $item)
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="p-4 text-center font-medium">{{ $barang->firstItem() + $loop->index }}</td>
                        <td class="p-4"><span class="bg-slate-100 text-slate-600 px-2 py-1 rounded-md text-xs font-mono font-bold">{{ $item->kode_barang }}</span></td>
                        <td class="p-4 font-bold text-slate-800">{{ $item->nama_barang }}</td>
                        <td class="p-4"><span class="truncate block max-w-[150px]" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</span></td>
                        <td class="p-4 text-center">
                            <span class="@if($item->stok < 5) text-red-600 @else text-green-600 @endif font-bold">
                                {{ $item->stok }}
                            </span>
                        </td>
                        <td class="p-4"><span class="bg-blue-50 text-blue-700 border border-blue-100 px-2 py-1 rounded-md text-xs font-semibold">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span></td>
                        <td class="p-4 font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="p-4">
                            <div class="flex gap-2 justify-center items-center">
                                <a href="{{ route('admin.editData', $item->id) }}" class="bg-[#0091D5] flex gap-1 p-2 items-center hover:bg-[#007cb5] transition-all rounded-lg text-white shadow-sm hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" /></svg>
                                </a>
                                
                                <button type="button" onclick="showDetailModal('{{ $item->kode_barang }}', '{{ addslashes($item->nama_barang) }}', '{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}', 'Rp {{ number_format($item->harga, 0, ',', '.') }}', '{{ $item->stok }}', '{{ addslashes(str_replace(["\r", "\n"], " ", $item->deskripsi)) }}', '{{ $item->image ? asset('storage/' . $item->image) : '' }}')" class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#d65f3f] transition-all rounded-lg text-white shadow-sm hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" /><path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" /></g></svg>
                                </button>

                                <form action="{{ route('admin.destroyData', $item->id) }}" method="POST" class="inline-block form-delete">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 flex gap-1 p-2 items-center hover:bg-red-600 transition-all rounded-lg text-white shadow-sm hover:-translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><g fill="currentColor"><path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd" /><path d="M9 9h2v8H9zm4 0h2v8h-2z" /></g></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center p-8 text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" class="text-slate-300" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16zM3.27 6.96L12 12.01l8.73-5.05M12 22.08V12"/></svg>
                                <span class="font-medium">Barang tidak ditemukan</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($barang->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $barang->links() }}
        </div>
        @endif
    </div>

    <div wire:ignore>
        <div id="detailModal" class="fixed inset-0 z-[9999] items-center justify-center bg-slate-900/60 backdrop-blur-sm transition-opacity duration-300 ease-in-out opacity-0 hidden">
            
            <div id="modalContent" class="w-[90%] md:w-[500px] max-h-[90vh] overflow-y-auto p-6 bg-white rounded-2xl shadow-2xl transition-all duration-300 ease-in-out opacity-0 scale-95 transform">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-extrabold text-[#1C4E80]">DETAIL PRODUK</h2>
                    <button type="button" onclick="closeModal()" class="text-slate-400 hover:text-red-500 transition-colors p-1 bg-slate-100 hover:bg-red-50 rounded-full cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6L6 18M6 6l12 12"/></svg>
                    </button>
                </div>
                <hr class="border-slate-100 mb-6">
                
                <div class="flex flex-col gap-4 text-slate-700">
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Kode Barang</p>
                        <h3 id="modalKode" class="col-span-2 font-bold font-mono"></h3>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Nama Produk</p>
                        <h3 id="modalNama" class="col-span-2 font-bold text-lg"></h3>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Kategori</p>
                        <h3 id="modalKategori" class="col-span-2 font-semibold"></h3>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Harga</p>
                        <h3 id="modalHarga" class="col-span-2 font-extrabold text-[#15C11B]"></h3>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Stok</p>
                        <h3 id="modalStok" class="col-span-2 font-bold"></h3>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-sm font-medium text-slate-500">Deskripsi</p>
                        <h3 id="modalDeskripsi" class="col-span-2 font-bold"></h3>
                    </div>
                    <div class="mt-2">
                        <p class="text-sm font-medium text-slate-500 mb-2">Gambar Produk</p>
                        <div class="bg-slate-50 rounded-xl border border-slate-200 p-2 flex justify-center items-center min-h-[150px]">
                            <img id="modalGambar" src="" alt="Gambar Produk" class="hidden max-h-[200px] object-contain rounded-lg">
                            <span id="noGambarText" class="text-slate-400 text-sm font-medium">Tidak ada gambar</span>
                        </div>
                    </div>
                </div>

                <button type="button" onclick="closeModal()" class="w-full mt-8 px-4 py-3 text-white font-semibold bg-slate-800 rounded-xl hover:bg-slate-700 transition-colors shadow-md cursor-pointer">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>

    <script>
        const detailModal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');
        const imgElement = document.getElementById('modalGambar');
        const noImgText = document.getElementById('noGambarText');

        // FUNGI UTAMA: Teleport (pindahkan) modal ke <body> agar terbebas dari jeratan CSS Transform pada parent.
        document.addEventListener("DOMContentLoaded", () => {
            if (detailModal && detailModal.parentNode !== document.body) {
                document.body.appendChild(detailModal);
            }
        });

        function showDetailModal(kode, nama, kategori, harga, stok, deskripsi, imageUrl) {
            // Pengaman ekstra jika modal belum pindah ke body
            if (detailModal.parentNode !== document.body) {
                document.body.appendChild(detailModal);
            }
            
            // Isi Data
            document.getElementById('modalKode').innerText = kode;
            document.getElementById('modalNama').innerText = nama;
            document.getElementById('modalKategori').innerText = kategori;
            document.getElementById('modalHarga').innerText = harga;
            document.getElementById('modalStok').innerText = stok;
            document.getElementById('modalDeskripsi').innerText = deskripsi;
            
            if(imageUrl) {
                imgElement.src = imageUrl;
                imgElement.classList.remove('hidden');
                noImgText.classList.add('hidden');
            } else {
                imgElement.classList.add('hidden');
                noImgText.classList.remove('hidden');
            }

            // Animasi Masuk (Tampilkan block dulu, baru opacity)
            detailModal.classList.remove('hidden');
            detailModal.classList.add('flex'); // Pakai flex agar otomatis align center
            
            setTimeout(() => {
                detailModal.classList.remove('opacity-0');
                modalContent.classList.remove('opacity-0', 'scale-95');
            }, 10);
        }

        function closeModal() {
            // Animasi Keluar
            detailModal.classList.add('opacity-0');
            modalContent.classList.add('opacity-0', 'scale-95');
            
            setTimeout(() => {
                detailModal.classList.add('hidden');
                detailModal.classList.remove('flex'); // Matikan flex agar benar-benar tersembunyi
            }, 300);
        }

        // Tutup jika area background blur di klik
        detailModal.addEventListener('click', function(e) {
            if(e.target === detailModal) {
                closeModal();
            }
        });
    </script>
</div>