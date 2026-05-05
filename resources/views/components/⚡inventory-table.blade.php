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

<div>
    <div class="w-4/5 mx-auto">
        <div class="flex justify-between mt-10">
            <div>
                <h1 class="font-bold text-3xl">INVENTORY</h1>
                <span class="text-xl font-semibold">TOTAL : {{ $total }} ITEM</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="">
                    <input type="text" wire:model.live="search" class="p-2 border-3 outline-none border-gray-300 hover:border-blue-400 active:border-blue-600 focus:border-blue-500 rounded-lg transition-colors" placeholder="Search..." required>
                    
                </div>
                <div>
                    <a href="{{ route('admin.addData') }}" class="bg-[#15C11B] p-2 text-white rounded-lg hover:bg-[#0f8f14] active:bg-[#15C11B] transition-colors cursor-pointer flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z" />
                        </svg>
                        <span>TAMBAH PRODUK</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-4/5 mx-auto rounded-lg my-5 overflow-x-auto shadow-xl">
        <table class="w-full text-white">
            <thead class="bg-[#1C4E80]">
                <tr>
                    <td class="p-4 font-bold">NO</td>
                    <td class="p-4 font-bold">KODE</td>
                    <td class="p-4 font-bold">NAMA</td>
                    <td class="p-4 font-bold">DESKRIPSI</td>
                    <td class="p-4 font-bold">STOK</td>
                    <td class="p-4 font-bold">KATEGORI</td>
                    <td class="p-4 font-bold">HARGA</td>
                    <td class="p-4 font-bold">GAMBAR</td>
                    <td class="p-4 font-bold">AKSI</td>
                </tr>
            </thead>
            <tbody class="text-black">
                @forelse($barang as $item)
                <tr class="border-b border-[#A5D8DD] hover:bg-gray-50 transition-colors p-5">
                    <td class="p-4">{{ $barang->firstItem() + $loop->index }}</td>
                    <td class="p-4">{{ $item->kode_barang }}</td>
                    <td class="p-4">{{ $item->nama_barang }}</td>
                    <td class="p-4">{{ $item->deskripsi }}</td>
                    <td class="p-4">{{ $item->stok }}</td>
                    <td class="p-4">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</td>
                    <td class="p-4">{{ number_format($item->harga, 2, ',', '.') }}</td>
                    <td class="p-4"><img src="{{ asset('storage/' . $item->image ) }}" alt="{{ $item->image ? "$item->nama_barang" : "Tidak ada gambar" }}" width="150px"></td>
                    <td class="px-4 ">
                        <div class="flex gap-2 justify-center items-center">
                            <a href="{{ route('admin.editData', $item->id) }}" class="">
                                <button type="button" class="bg-[#0091D5] flex gap-1 p-2 items-center hover:bg-[#0088c7] active:bg-[#0091D5] transition-colors rounded-md text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                                    </svg>
                                    <span class="font-semibold text-sm">Edit</span>
                                </button>
                            </a>

                            <button onclick="showDetail({{ $item->id }})" class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#dd6442] active:bg-[#EA6A47] transition-colors rounded-md text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                    </g>
                                </svg>
                                <span class="font-semibold text-sm">Show</span>
                            </button>

                            <form action="{{ route('admin.destroyData', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 flex gap-1 p-2 items-center hover:bg-red-700 active:bg-red-600 transition-colors rounded-md text-white cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <g fill="currentColor">
                                            <path fill-rule="evenodd" d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" clip-rule="evenodd" />
                                            <path d="M9 9h2v8H9zm4 0h2v8h-2z" />
                                        </g>
                                    </svg>
                                    <span class="font-semibold text-sm">Delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center p-4 font-bold text-xl">BARANG TIDAK DITEMUKAN</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $barang->links() }}
        </div>
        <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/10 backdrop-blur-sm transition-opacity duration-300 ease-in-out opacity-0">
            <div id="modalContent" class="w-11/12 md:w-1/2 max-h-[90vh] overflow-y-auto p-6 bg-white rounded-lg shadow-lg transition-all duration-300 ease-in-out opacity-0 scale-95">
                <div class="flex flex-col gap-5 justify-center">
                    <div>
                        <h2 class="mb-4 text-xl font-bold">DETAIL PRODUK</h2>
                        <hr>
                    </div>
                    <div>
                        <p>Kode Barang</p>
                        <h3 id="modalKode" class="font-bold text-xl"></h3>
                    </div>
                    <div>
                        <p>Nama Barang</p>
                        <h3 id="modalNama" class="font-bold text-xl"></h3>
                    </div>
                    <div>
                        <p>Kategori</p>
                        <h3 id="modalKategori" class="font-bold text-xl"></h3>
                    </div>
                    <div>
                        <p>Harga</p>
                        <h3 id="modalHarga" class="font-bold text-xl"></h3>
                    </div>
                    <div>
                        <p>Stok</p>
                        <h3 id="modalStok" class="font-bold text-xl"></h3>
                    </div>
                    <div>
                        <p>Gambar</p>
                        <img id="modalGambar" src="" alt="Gambar Produk" class="hidden max-w-xs mt-2 rounded shadow-sm" width="200px">
                    </div>
                </div>

                <button onclick="closeModal()" class="px-4 py-2 mt-4 text-white bg-gray-500 rounded hover:bg-gray-600 cursor-pointer transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>