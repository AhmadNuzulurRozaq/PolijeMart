@extends('layouts.sidebar')

@section('title', 'Dashboard - Polije Mart')

@section('content')

<div class="w-full max-w-7xl mx-auto p-6 lg:p-8">
    
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard Overview</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Selamat datang, <span class="text-[#1C4E80] font-bold">{{ auth()->user()->name ?? 'Admin' }}</span>! Berikut adalah ringkasan sistem Polije Mart saat ini.</p>
    </div>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#1C4E80] to-[#0091D5] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18s-.41-.06-.57-.18l-7.9-4.44A.99.99 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18s.41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 4.15L6.04 7.5L12 10.85l5.96-3.35zM5 15.91l6 3.38v-6.71L5 9.21zm14 0v-6.7l-6 3.37v6.71z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Produk</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $total ?? 0 }}</h1>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#069BC0] to-[#047a9c] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18s-.41-.06-.57-.18l-7.9-4.44A.99.99 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18s.41.06.57.18l7.9 4.44c.32.17.53.5.53.88zM12 4.15L6.04 7.5L12 10.85l5.96-3.35zM5 15.91l6 3.38v-6.71L5 9.21zm14 0v-6.7l-6 3.37v6.71z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Kategori</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $category ?? 0 }}</h1>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#EA6A47] to-[#d65f3f] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2M1 2h3.27l.94 2H20a1 1 0 0 1 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1l-.9 1.63l-.03.12a.25.25 0 0 0 .25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1zm6 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2m9-7l2.78-5H6.14l2.36 5z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Pesanan Masuk</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $order ?? 0 }}</h1>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 flex items-center gap-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#10b981] to-[#059669] flex items-center justify-center text-white shrink-0 shadow-inner group-hover:scale-110 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M12 3C7.03 3 3 4.79 3 7s4.03 4 9 4s9-1.79 9-4s-4.03-4-9-4zm0 6c-3.31 0-6-1.02-6-2.25S8.69 4.5 12 4.5s6 1.02 6 2.25S15.31 9 12 9zm0 3c-4.97 0-9 1.79-9 4s4.03 4 9 4s9-1.79 9-4s-4.03-4-9-4zm0 6c-4.97 0-9 1.79-9 4s4.03 4 9 4s9-1.79 9-4s-4.03-4-9-4z"/></svg>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Stok</p>
                <h1 class="text-3xl font-black text-slate-800">{{ $totalStok ?? 0 }}</h1>
            </div>
        </div>

    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-bold text-slate-700 mb-4">Statistik Jumlah Produk Berdasarkan Kategori</h3>
            <div class="w-full relative h-[400px]">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-bold text-slate-700 mb-4">Statistik Status Pesanan</h3>
            <div class="w-full relative h-[400px]">
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
    </section>

    <!-- Grafik Stok Inventory -->
    <section class="mt-6 mb-10">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-bold text-slate-700 mb-4">Statistik Stok Produk di Inventory</h3>
            <div class="w-full relative h-[400px]">
                <canvas id="inventoryStockChart"></canvas>
            </div>
        </div>
    </section>

</div>

<!-- Tambahkan Chart.js melalui CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil data dari model dan parsing langsung ke JSON Object
        const rawData = @json(\App\Models\Barang::select('kategori_id', \Illuminate\Support\Facades\DB::raw('count(*) as total'))->groupBy('kategori_id')->with('kategori')->get());
        
        // Map data menggunakan JavaScript
        const labels = rawData.map(item => item.kategori ? item.kategori.nama_kategori : 'Tanpa Kategori');
        const values = rawData.map(item => item.total);

        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Produk',
                    data: values,
                    backgroundColor: 'rgba(6, 155, 192, 0.7)',
                    borderColor: 'rgba(6, 155, 192, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });

        // Ambil data status pesanan dari model Penjualan
        const rawOrderStatusData = @json(\App\Models\Penjualan::select('status', \Illuminate\Support\Facades\DB::raw('count(*) as total'))->groupBy('status')->get());
        
        // Map data status
        const statusLabels = rawOrderStatusData.map(item => item.status.toUpperCase());
        const statusValues = rawOrderStatusData.map(item => item.total);
        
        // Berikan warna spesifik sesuai jenis statusnya (Proses=Kuning/Orange, Selesai=Hijau, Batal=Merah)
        const statusColors = rawOrderStatusData.map(item => {
            if(item.status === 'proses') return 'rgba(245, 158, 11, 0.7)'; // Amber
            if(item.status === 'selesai') return 'rgba(34, 197, 94, 0.7)'; // Green
            if(item.status === 'batal') return 'rgba(239, 68, 68, 0.7)'; // Red
            return 'rgba(156, 163, 175, 0.7)'; // Gray (Fallback)
        });

        const ctxStatus = document.getElementById('orderStatusChart').getContext('2d');
        const orderStatusChart = new Chart(ctxStatus, {
            type: 'doughnut', // Menggunakan tipe Donat
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Jumlah Pesanan',
                    data: statusValues,
                    backgroundColor: statusColors,
                    borderWidth: 0, // Dibuat 0 agar tampil lebih modern tanpa border
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Ambil data stok barang (Diurutkan dari stok terbanyak)
        // Menggunakan limit take(20) opsional jika produk terlalu banyak agar grafik tetap rapi
        const rawStockData = @json(\App\Models\Barang::select('nama_barang', 'stok')->orderBy('stok', 'desc')->take(20)->get());
        
        const stockLabels = rawStockData.map(item => item.nama_barang);
        const stockValues = rawStockData.map(item => item.stok);

        const ctxStock = document.getElementById('inventoryStockChart').getContext('2d');
        const inventoryStockChart = new Chart(ctxStock, {
            type: 'bar',
            data: {
                labels: stockLabels,
                datasets: [{
                    label: 'Jumlah Stok Aktual',
                    data: stockValues,
                    backgroundColor: 'rgba(28, 78, 128, 0.7)', // Warna navy selaras dengan tema #1C4E80
                    borderColor: 'rgba(28, 78, 128, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>

@endsection