<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangs = [
            [
                'kode_barang' => 'TF-SGM-01',
                'nama_barang' => 'Nasi Goreng Spesial',
                'deskripsi' => 'Nasi goreng dengan telur, ayam, dan sayuran segar. Rasa otentik Indonesia.',
                'stok' => 13,
                'kategori_id' => 4,
                'harga' => 10000,
                'image' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=800',
            ],
            [
                'kode_barang' => 'TF-MIE-02',
                'nama_barang' => 'Mie Ayam Bakso',
                'deskripsi' => 'Mie ayam dengan bakso sapi pilihan dan kuah kaldu yang gurih.',
                'stok' => 25,
                'kategori_id' => 4,
                'harga' => 12000,
                'image' => 'https://images.unsplash.com/photo-1552611052-33e04de081de?w=800',
            ],
            [
                'kode_barang' => 'TF-SAT-03',
                'nama_barang' => 'Sate Ayam Madura',
                'deskripsi' => 'Sate ayam dengan bumbu kacang khas Madura yang lezat.',
                'stok' => 30,
                'kategori_id' => 4,
                'harga' => 15000,
                'image' => 'https://images.unsplash.com/photo-1529193591184-b1d58069ecdd?w=800',
            ],
            [
                'kode_barang' => 'TF-GAD-04',
                'nama_barang' => 'Gado-Gado Jakarta',
                'deskripsi' => 'Sayuran segar dengan bumbu kacang dan kerupuk.',
                'stok' => 20,
                'kategori_id' => 4,
                'harga' => 11000,
                'image' => 'https://images.unsplash.com/photo-1541518763669-27fefb4b0728?w=800',
            ],
            [
                'kode_barang' => 'TF-SOT-05',
                'nama_barang' => 'Soto Ayam Lamongan',
                'deskripsi' => 'Soto ayam dengan kuah kuning yang segar dan koya.',
                'stok' => 18,
                'kategori_id' => 4,
                'harga' => 13000,
                'image' => 'https://images.unsplash.com/photo-1547592166-23acbe346499?w=800',
            ],
            [
                'kode_barang' => 'MN-ESJ-06',
                'nama_barang' => 'Es Jeruk Segar',
                'deskripsi' => 'Minuman jeruk peras segar tanpa pemanis buatan.',
                'stok' => 50,
                'kategori_id' => 5,
                'harga' => 8000,
                'image' => 'https://images.unsplash.com/photo-1613478223719-2ab802602423?w=800',
            ],
            [
                'kode_barang' => 'MN-EST-07',
                'nama_barang' => 'Es Teh Manis',
                'deskripsi' => 'Teh manis dingin yang menyegarkan.',
                'stok' => 60,
                'kategori_id' => 5,
                'harga' => 5000,
                'image' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=800',
            ],
            [
                'kode_barang' => 'MN-KOF-08',
                'nama_barang' => 'Kopi Hitam',
                'deskripsi' => 'Kopi hitam pekat tanpa gula.',
                'stok' => 40,
                'kategori_id' => 5,
                'harga' => 7000,
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=800',
            ],
            [
                'kode_barang' => 'MN-JUS-09',
                'nama_barang' => 'Jus Alpukat',
                'deskripsi' => 'Jus alpukat segar dengan susu dan coklat.',
                'stok' => 25,
                'kategori_id' => 5,
                'harga' => 12000,
                'image' => 'https://images.unsplash.com/photo-1523294587454-6428b580b67f?w=800',
            ],
            [
                'kode_barang' => 'SN-KRP-10',
                'nama_barang' => 'Kerupuk Udang',
                'deskripsi' => 'Kerupuk udang renyah dan gurih.',
                'stok' => 100,
                'kategori_id' => 6,
                'harga' => 3000,
                'image' => 'https://images.unsplash.com/photo-1621447504864-d8686e12698c?w=800',
            ],
            [
                'kode_barang' => 'SN-PIS-11',
                'nama_barang' => 'Pisang Goreng',
                'deskripsi' => 'Pisang goreng crispy dengan taburan keju.',
                'stok' => 35,
                'kategori_id' => 6,
                'harga' => 8000,
                'image' => 'https://images.unsplash.com/photo-1579954115545-a915b62346eb?w=800',
            ],
            [
                'kode_barang' => 'SN-RES-12',
                'nama_barang' => 'Resoles Sayur',
                'deskripsi' => 'Resoles isi sayuran dan daging ayam.',
                'stok' => 40,
                'kategori_id' => 6,
                'harga' => 4000,
                'image' => 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=800',
            ],
            [
                'kode_barang' => 'TF-REN-13',
                'nama_barang' => 'Rendang Daging',
                'deskripsi' => 'Rendang daging sapi khas Padang dengan bumbu rempah.',
                'stok' => 15,
                'kategori_id' => 4,
                'harga' => 25000,
                'image' => 'https://images.unsplash.com/photo-1635437930207-488f97dfdf87?w=800',
            ],
            [
                'kode_barang' => 'TF-AYG-14',
                'nama_barang' => 'Ayam Goreng Kremes',
                'deskripsi' => 'Ayam goreng dengan kremes renyah dan sambal.',
                'stok' => 22,
                'kategori_id' => 4,
                'harga' => 18000,
                'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?w=800',
            ],
            [
                'kode_barang' => 'TF-BKS-15',
                'nama_barang' => 'Bakso Urat',
                'deskripsi' => 'Bakso urat sapi dengan kuah kaldu dan mie.',
                'stok' => 28,
                'kategori_id' => 4,
                'harga' => 14000,
                'image' => 'https://images.unsplash.com/photo-1569058242253-92a9c755a0ec?w=800',
            ],
            [
                'kode_barang' => 'MN-SUS-16',
                'nama_barang' => 'Susu Coklat',
                'deskripsi' => 'Susu coklat hangat atau dingin.',
                'stok' => 45,
                'kategori_id' => 5,
                'harga' => 9000,
                'image' => 'https://images.unsplash.com/photo-1576618148400-f54bed99fcf8?w=800',
            ],
            [
                'kode_barang' => 'SN-LUM-17',
                'nama_barang' => 'Lumpia Semarang',
                'deskripsi' => 'Lumpia isi rebung dan udang.',
                'stok' => 30,
                'kategori_id' => 6,
                'harga' => 10000,
                'image' => 'https://images.unsplash.com/photo-1626074353765-517a681e40be?w=800',
            ],
            [
                'kode_barang' => 'TF-PEK-18',
                'nama_barang' => 'Pek Cam Ke',
                'deskripsi' => 'Mie goreng khas китай dengan sayuran.',
                'stok' => 20,
                'kategori_id' => 4,
                'harga' => 13000,
                'image' => 'https://images.unsplash.com/photo-1555126634-323283e090fa?w=800',
            ],
            [
                'kode_barang' => 'MN-DEJ-19',
                'nama_barang' => 'Es Degan',
                'deskripsi' => 'Es kelapa muda segar dengan sirup.',
                'stok' => 35,
                'kategori_id' => 5,
                'harga' => 10000,
                'image' => 'https://images.unsplash.com/photo-1546173159-315724a31696?w=800',
            ],
            [
                'kode_barang' => 'SN-MAR-20',
                'nama_barang' => 'Martabak Manis',
                'deskripsi' => 'Martabak manis dengan topping coklat dan keju.',
                'stok' => 25,
                'kategori_id' => 6,
                'harga' => 15000,
                'image' => 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=800',
            ],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
