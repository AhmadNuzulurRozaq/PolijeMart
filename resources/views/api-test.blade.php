<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Konsumsi API Polije Mart</title>
    <!-- Menggunakan Tailwind CDN agar langsung rapi untuk demo -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10 font-sans">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-2">Katalog Produk Polije Mart</h1>
        <p class="text-gray-600 mb-8">Data di bawah ini dimuat secara dinamis menggunakan JavaScript (Fetch) dari Endpoint API kita.</p>
        
        <!-- Tempat di mana Card Produk akan dimunculkan oleh JavaScript -->
        <div id="product-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <p class="text-blue-500 font-bold animate-pulse">Sedang mengambil data dari API...</p>
        </div>
    </div>

    <!-- KODE JAVASCRIPT UNTUK MENGONSUMSI API -->
    <script>
        // 1. Panggil URL API kita
        fetch('/api/products')
            .then(response => response.json()) // 2. Ubah response menjadi JSON
            .then(result => {
                const container = document.getElementById('product-container');
                container.innerHTML = ''; // Hapus teks "Sedang mengambil data..."

                // 3. Cek apakah sukses
                if(result.success) {
                    // 4. Lakukan perulangan untuk setiap barang, lalu buatkan HTML-nya
                    result.data.forEach(product => {
                        const kategori = product.kategori ? product.kategori.nama_kategori : 'Tidak ada kategori';
                        
                        const cardHTML = `
                            <div class="bg-white p-5 rounded-lg shadow-md border-t-4 border-blue-500">
                                <h2 class="text-xl font-bold text-gray-800">${product.nama_barang}</h2>
                                <p class="text-sm text-gray-500 mb-3">${kategori}</p>
                                <p class="text-2xl font-bold text-green-600">Rp ${product.harga.toLocaleString('id-ID')}</p>
                                <p class="text-sm text-gray-600 mt-2">Stok Tersedia: ${product.stok}</p>
                            </div>
                        `;
                        // 5. Masukkan HTML tadi ke dalam container di layar
                        container.innerHTML += cardHTML;
                    });
                }
            })
            .catch(error => console.error('Gagal mengambil API:', error));
    </script>
</body>
</html>