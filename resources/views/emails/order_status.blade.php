<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Pesanan - Polije Mart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fallback CSS jika klien email menonaktifkan eksekusi JavaScript (Tailwind CDN) */
        body { font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #f1f5f9; }
        .header { background-color: #1C4E80; padding: 24px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 800; letter-spacing: 1px; }
        .content { padding: 32px; }
        .text-primary { color: #1C4E80; }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800 p-4 sm:p-8">
    
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden container">
        
        <!-- Header / Logo -->
        <div class="bg-[#1C4E80] p-6 sm:p-8 text-center header">
            <img src="{{ $message->embed(public_path('images/logoPolije.png')) }}" alt="Logo Polije" style="max-width: 100px; margin: 0 auto 15px auto;" class="w-24 mx-auto mb-4 drop-shadow-md">
            <h1 class="text-3xl font-extrabold text-white tracking-widest uppercase">POLIJE MART</h1>
        </div>

        <!-- Body Content -->
        <div class="p-6 sm:p-8 content">
            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4">Halo, {{ $penjualan->user->name ?? 'Pelanggan' }}!</h2>
            
            <p class="text-slate-600 mb-6 leading-relaxed">
                Kami menginformasikan bahwa status pesanan Anda dengan nomor ID referensi <strong class="text-[#1C4E80]">#{{ $penjualan->id }}</strong> telah diperbarui.
            </p>

            <!-- Status Badge -->
            <div class="flex justify-center mb-8">
                @if($status_baru == 'selesai')
                    <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-3 rounded-xl inline-flex items-center justify-center gap-2 text-center w-full sm:w-auto">
                        <span class="text-lg font-black uppercase tracking-widest">Siap Diambil</span>
                    </div>
                @elseif($status_baru == 'batal')
                    <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-3 rounded-xl inline-flex items-center justify-center gap-2 text-center w-full sm:w-auto">
                        <span class="text-lg font-black uppercase tracking-widest">Dibatalkan</span>
                    </div>
                @endif
            </div>

            <!-- Info Batas Waktu Ambil -->
            @if($status_baru == 'selesai' && $penjualan->batas_waktu)
            <div class="bg-orange-50 border-l-4 border-orange-500 p-4 mb-8 rounded-r-xl text-orange-700 text-sm">
                <strong class="block mb-1 font-bold">Perhatian:</strong> 
                Harap segera mengambil pesanan Anda di kasir Polije Mart sebelum batas waktu habis pada: <br>
                <span class="font-mono font-bold mt-1 inline-block text-orange-800 bg-orange-100 px-2 py-1 rounded">{{ \Carbon\Carbon::parse($penjualan->batas_waktu)->format('d M Y, H:i') }} WIB</span>
            </div>
            @endif

            <!-- Detail Pesanan -->
            <div class="border border-slate-100 rounded-xl overflow-hidden mb-8">
                <div class="bg-slate-50 px-4 py-3 border-b border-slate-100">
                    <h3 class="font-bold text-slate-700">Ringkasan Pembelian</h3>
                </div>
                <div class="p-4 overflow-x-auto">
                    <table class="w-full text-left text-sm whitespace-nowrap">
                        <tbody class="divide-y divide-slate-100">
                           
                            @foreach($penjualan->detail_penjualans as $detail)
                            <tr class="text-slate-600">
                                <td class="py-3 pr-4 font-medium">{{ $detail->barang->nama_barang ?? 'Produk Dihapus' }}</td>
                                <td class="py-3 px-4 font-bold text-center text-slate-400">x{{ $detail->jumlah }}</td>
                                <td class="py-3 pl-4 font-bold text-right">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-t-2 border-slate-100">
                            @php
                                $biayaLayanan = 2000;
                            @endphp
                            <tr>
                                <td colspan="2" class="py-4 pr-4 font-bold text-slate-800 text-right">Biaya Layanan :</td>
                                <td class="py-3 pl-4 font-bold text-right">Rp {{ number_format($biayaLayanan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="py-4 pr-4 font-bold text-slate-800 text-right">Total Pembayaran :</td>
                                <td class="py-4 pl-4 font-black text-[#1C4E80] text-right text-base">Rp {{ number_format($penjualan->total_bayar, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <p class="text-slate-500 text-sm leading-relaxed mb-2">
                Apabila Anda memiliki kendala atau pertanyaan lebih lanjut terkait pesanan ini, silakan hubungi tim dukungan kami atau temui admin di tempat.
            </p>
            <p class="text-slate-500 text-sm font-bold leading-relaxed">
                Terima kasih telah berbelanja di Polije Mart!
            </p>
        </div>

        <!-- Footer Content -->
        <div class="bg-slate-50 border-t border-slate-100 p-6 text-center">
            <p class="text-xs text-slate-400 font-medium">&copy; {{ date('Y') }} Polije Mart. All rights reserved.</p>
        </div>
    </div>
</body>
</html>