@extends('layouts.user.HeaFoot')

@section('title', 'Manage Product - Polije Mart')

@section('content')

<div class="min-h-screen bg-gray-50 p-8 font-sans mx-auto">
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Kelola Pesanan Polije Mart</h1>
            <p class="text-gray-500 mt-1">Manajemen transaksi dan pengambilan barang inventaris</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-500 border-b border-gray-100">
                        <th class="px-6 py-4 font-semibold text-white w-16 text-center">No</th>
                        <th class="px-6 py-4 font-semibold text-white">Nama Pembeli</th>
                        <th class="px-6 py-4 font-semibold text-white">Tanggal</th>
                        <th class="px-6 py-4 font-semibold text-white">Total Harga</th>
                        <th class="px-6 py-4 font-semibold text-white">Status</th>
                        <th class="px-6 py-4 font-semibold text-white">Batas Waktu</th>
                        <th class="px-6 py-4 font-semibold text-white text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4 text-center text-gray-600">1</td>
                        <td class="px-6 py-4 font-bold text-gray-800">Abhisto</td>
                        <td class="px-6 py-4 text-gray-600">24 Apr 2026</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">Rp 150.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-blue-600 text-white">
                                Selesai
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm italic">Sudah Diambil</td>
                        <td class="px-6 py-4 text-center">
                              <button class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#dd6442] active:bg-[#EA6A47] transition-colors rounded-md text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                    </g>
                                </svg>
                                <span class="font-semibold text-sm">Show</span>
                            </button>
                            <tbody class="divide-y divide-gray-200">
                                      <tr>
                                      </tr>
                            </tbody>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/80 transition-colors bg-gray-50/30">
                        <td class="px-6 py-4 text-center text-gray-600">2</td>
                        <td class="px-6 py-4 font-bold text-gray-800">Erix agung</td>
                        <td class="px-6 py-4 text-gray-600">25 Apr 2026</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">Rp 75.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-yellow-200 text-yellow-700">
                                Menunggu
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm arial-bold">12.19.50</td>
                        <td class="px-6 py-4 text-center">
                              <button  class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#dd6442] active:bg-[#EA6A47] transition-colors rounded-md text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                    </g>
                                </svg>
                                <span class="font-semibold text-sm">Show</span>
                            </button>
                             <tbody class="divide-y divide-gray-200">
                                      <tr>-</tr>
                            </tbody>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/80 transition-colors bg-gray-50/30">
                        <td class="px-6 py-4 text-center text-gray-600">2</td>
                        <td class="px-6 py-4 font-bold text-gray-800">Nuzul</td>
                        <td class="px-6 py-4 text-gray-600">25 Apr 2026</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">Rp 75.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-yellow-200 text-yellow-700">
                                Menunggu
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm arial-bold">12.19.50</td>
                        <td class="px-6 py-4 text-center">
                              <button  class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#dd6442] active:bg-[#EA6A47] transition-colors rounded-md text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                    </g>
                                </svg>
                                <span class="font-semibold text-sm">Show</span>
                            </button>
                             <tbody class="divide-y divide-gray-200">
                                     
                            </tbody>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/80 transition-colors bg-gray-50/30">
                        <td class="px-6 py-4 text-center text-gray-600">2</td>
                        <td class="px-6 py-4 font-bold text-gray-800">Rafie</td>
                        <td class="px-6 py-4 text-gray-600">25 Apr 2026</td>
                        <td class="px-6 py-4 text-gray-800 font-medium">Rp 75.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-yellow-200 text-yellow-700">
                                Menunggu
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm arial-bold">12.19.50</td>
                        <td class="px-6 py-4 text-center">
                              <button  class="bg-[#EA6A47] flex gap-1 p-2 items-center hover:bg-[#dd6442] active:bg-[#EA6A47] transition-colors rounded-md text-white cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M15 12a3 3 0 1 1-6 0a3 3 0 0 1 6 0" />
                                        <path d="M2 12c1.6-4.097 5.336-7 10-7s8.4 2.903 10 7c-1.6 4.097-5.336 7-10 7s-8.4-2.903-10-7" />
                                    </g>
                                </svg>
                                <span class="font-semibold text-sm">Show</span>
                            </button>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection