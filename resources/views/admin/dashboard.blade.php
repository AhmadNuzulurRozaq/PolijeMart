@extends('layouts.sidebar')

@section('title', 'Dashboard - Polije Mart')

@section('content')

<div class="w-full max-w-7xl mx-auto p-6 lg:p-8">
    
    <div class="mb-10">
        <span class="text-xs font-extrabold text-secondary-600 uppercase tracking-[0.2em] block mb-2">Ringkasan Sistem</span>
        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Dashboard Overview</h1>
        <p class="text-sm text-slate-500 mt-2 font-medium">Selamat datang kembali, <span class="text-secondary-600 font-extrabold">{{ auth()->user()->name ?? 'Admin' }}</span>! Berikut adalah ringkasan operasional Polije Mart saat ini.</p>
    </div>

    <!-- Stats Cards Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        
        <!-- Card 1: Total Produk -->
        <div class="bg-white rounded-3xl p-6 shadow-premium hover:shadow-premium-hover hover:-translate-y-1.5 transition-all duration-300 border border-slate-100 flex items-center gap-6 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-600 to-primary-800 text-white flex items-center justify-center shrink-0 shadow-lg shadow-primary-700/20 group-hover:scale-110 transition-transform duration-300 relative overflow-hidden">
                <div class="absolute -right-2 -top-2 w-6 h-6 bg-white/10 rounded-full blur-sm"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 2-8" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none" /><path fill="currentColor" fill-rule="evenodd" d="M12 1.25c-.605 0-1.162.15-1.771.402c-.589.244-1.273.603-2.124 1.05L6.037 3.787c-1.045.548-1.88.987-2.527 1.418c-.668.447-1.184.917-1.559 1.554c-.374.635-.542 1.323-.623 2.142c-.078.795-.078 1.772-.078 3.002v.194c0 1.23 0 2.207.078 3.002c.081.82.25 1.507.623 2.142c.375.637.89 1.107 1.56 1.554c.645.431 1.481.87 2.526 1.418l2.068 1.085c.851.447 1.535.806 2.124 1.05c.61.252 1.166.402 1.771.402s1.162-.15 1.771-.402c.589-.244 1.273-.603 2.124-1.05l2.068-1.084c1.045-.549 1.88-.988 2.526-1.419c.67-.447 1.185-.917 1.56-1.554c.374-.635.542-1.323.623-2.142c.078-.795.078-1.772.078-3.001v-.196c0-1.229 0-2.206-.078-3.001c-.081-.82-.25-1.507-.623-2.142c-.375-.637-.89-1.107-1.56-1.554c-.645-.431-1.481-.87-2.526-1.418l-2.068-1.085c-.851-.447-1.535-.806-2.124-1.05c-.61-.252-1.166-.402-1.771-.402M8.77 4.046c.89-.467 1.514-.793 2.032-1.007c.504-.209.859-.289 1.198-.289c.34 0 .694.08 1.198.289c.518.214 1.141.54 2.031 1.007l2 1.05c1.09.571 1.855.974 2.428 1.356c.282.189.503.364.683.54l-3.331 1.665l-8.5-4.474zm-1.825.958l-.174.092c-1.09.571-1.855.974-2.427 1.356a4.7 4.7 0 0 0-.683.54L12 11.162l3.357-1.68l-8.206-4.318a.8.8 0 0 1-.206-.16M2.938 8.307c-.05.214-.089.457-.117.74c-.07.714-.071 1.617-.071 2.894v.117c0 1.278 0 2.181.071 2.894c.069.697.2 1.148.423 1.528c.222.377.543.696 1.1 1.068c.572.382 1.337.785 2.427 1.356l2 1.05c.89.467 1.513.793 2.031 1.007q.244.101.448.165v-8.663zm9.812 12.818q.204-.063.448-.164c.518-.214 1.141-.54 2.031-1.007l2-1.05c1.09-.572 1.855-.974 2.428-1.356c.556-.372.877-.691 1.1-1.068c.223-.38.353-.83.422-1.528c.07-.713.071-1.616.071-2.893v-.117c0-1.278 0-2.181-.071-2.894a6 6 0 0 0-.117-.74L17.75 9.963V13a.75.75 0 0 1-1.5 0v-2.286l-3.5 1.75z" clip-rule="evenodd" /></svg>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-white transform rotate-45 translate-x-1.5 translate-y-1.5"></div>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Total Produk</p>
                <h1 class="text-3xl font-black text-slate-800 leading-none">{{ $total ?? 0 }}</h1>
            </div>
        </div>

        <!-- Card 2: Kategori -->
        <div class="bg-white rounded-3xl p-6 shadow-premium hover:shadow-premium-hover hover:-translate-y-1.5 transition-all duration-300 border border-slate-100 flex items-center gap-6 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-secondary-400 to-secondary-600 text-white flex items-center justify-center shrink-0 shadow-lg shadow-secondary-500/20 group-hover:scale-110 transition-transform duration-300 relative overflow-hidden">
                <div class="absolute -right-2 -top-2 w-6 h-6 bg-white/10 rounded-full blur-sm"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M6 20h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2zM9 16h6M9 12h6" /></svg>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-white transform rotate-45 translate-x-1.5 translate-y-1.5"></div>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Kategori</p>
                <h1 class="text-3xl font-black text-slate-800 leading-none">{{ $category ?? 0 }}</h1>
            </div>
        </div>

        <!-- Card 3: Pesanan Masuk -->
        <div class="bg-white rounded-3xl p-6 shadow-premium hover:shadow-premium-hover hover:-translate-y-1.5 transition-all duration-300 border border-slate-100 flex items-center gap-6 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-400 to-amber-500 text-white flex items-center justify-center shrink-0 shadow-lg shadow-orange-500/20 group-hover:scale-110 transition-transform duration-300 relative overflow-hidden">
                <div class="absolute -right-2 -top-2 w-6 h-6 bg-white/10 rounded-full blur-sm"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2l4-4" /></svg>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-white transform rotate-45 translate-x-1.5 translate-y-1.5"></div>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Pesanan Masuk</p>
                <h1 class="text-3xl font-black text-slate-800 leading-none">{{ $order ?? 0 }}</h1>
            </div>
        </div>

        <!-- Card 4: Total Stok -->
        <div class="bg-white rounded-3xl p-6 shadow-premium hover:shadow-premium-hover hover:-translate-y-1.5 transition-all duration-300 border border-slate-100 flex items-center gap-6 group">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 text-white flex items-center justify-center shrink-0 shadow-lg shadow-emerald-500/20 group-hover:scale-110 transition-transform duration-300 relative overflow-hidden">
                <div class="absolute -right-2 -top-2 w-6 h-6 bg-white/10 rounded-full blur-sm"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 2-8" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none" /><path fill="currentColor" fill-rule="evenodd" d="M12 1.25c-.605 0-1.162.15-1.771.402c-.589.244-1.273.603-2.124 1.05L6.037 3.787c-1.045.548-1.88.987-2.527 1.418c-.668.447-1.184.917-1.559 1.554c-.374.635-.542 1.323-.623 2.142c-.078.795-.078 1.772-.078 3.002v.194c0 1.23 0 2.207.078 3.002c.081.82.25 1.507.623 2.142c.375.637.89 1.107 1.56 1.554c.645.431 1.481.87 2.526 1.418l2.068 1.085c.851.447 1.535.806 2.124 1.05c.61.252 1.166.402 1.771.402s1.162-.15 1.771-.402c.589-.244 1.273-.603 2.124-1.05l2.068-1.084c1.045-.549 1.88-.988 2.526-1.419c.67-.447 1.185-.917 1.56-1.554c.374-.635.542-1.323.623-2.142c.078-.795.078-1.772.078-3.001v-.196c0-1.229 0-2.206-.078-3.001c-.081-.82-.25-1.507-.623-2.142c-.375-.637-.89-1.107-1.56-1.554c-.645-.431-1.481-.87-2.526-1.418l-2.068-1.085c-.851-.447-1.535-.806-2.124-1.05c-.61-.252-1.166-.402-1.771-.402M8.77 4.046c.89-.467 1.514-.793 2.032-1.007c.504-.209.859-.289 1.198-.289c.34 0 .694.08 1.198.289c.518.214 1.141.54 2.031 1.007l2 1.05c1.09.571 1.855.974 2.428 1.356c.282.189.503.364.683.54l-3.331 1.665l-8.5-4.474zm-1.825.958l-.174.092c-1.09.571-1.855.974-2.427 1.356a4.7 4.7 0 0 0-.683.54L12 11.162l3.357-1.68l-8.206-4.318a.8.8 0 0 1-.206-.16M2.938 8.307c-.05.214-.089.457-.117.74c-.07.714-.071 1.617-.071 2.894v.117c0 1.278 0 2.181.071 2.894c.069.697.2 1.148.423 1.528c.222.377.543.696 1.1 1.068c.572.382 1.337.785 2.427 1.356l2 1.05c.89.467 1.513.793 2.031 1.007q.244.101.448.165v-8.663zm9.812 12.818q.204-.063.448-.164c.518-.214 1.141-.54 2.031-1.007l2-1.05c1.09-.572 1.855-.974 2.428-1.356c.556-.372.877-.691 1.1-1.068c.223-.38.353-.83.422-1.528c.07-.713.071-1.616.071-2.893v-.117c0-1.278 0-2.181-.071-2.894a6 6 0 0 0-.117-.74L17.75 9.963V13a.75.75 0 0 1-1.5 0v-2.286l-3.5 1.75z" clip-rule="evenodd" /></svg>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-white transform rotate-45 translate-x-1.5 translate-y-1.5"></div>
            </div>
            <div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Total Stok</p>
                <h1 class="text-3xl font-black text-slate-800 leading-none">{{ $totalStok ?? 0 }}</h1>
            </div>
        </div>

    </section>

    <!-- Charts Layout Section -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-[2rem] shadow-premium border border-slate-100 p-6 sm:p-8">
            <h3 class="text-base font-black text-slate-800 mb-6 flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-secondary-500 rounded-full"></span>
                Statistik Produk Berdasarkan Kategori
            </h3>
            <div class="w-full relative h-[360px]">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
        
        <div class="bg-white rounded-[2rem] shadow-premium border border-slate-100 p-6 sm:p-8">
            <h3 class="text-base font-black text-slate-800 mb-6 flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-orange-400 rounded-full"></span>
                Statistik Status Pesanan
            </h3>
            <div class="w-full relative h-[360px]">
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
    </section>

    <!-- Grafik Stok Inventory -->
    <section class="mt-6 mb-10">
        <div class="bg-white rounded-[2rem] shadow-premium border border-slate-100 p-6 sm:p-8">
            <h3 class="text-base font-black text-slate-800 mb-6 flex items-center gap-2">
                <span class="w-2.5 h-2.5 bg-primary-650 rounded-full"></span>
                Statistik Stok Aktual Produk di Inventory (Top 20)
            </h3>
            <div class="w-full relative h-[380px]">
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