-- KATEGORI
INSERT INTO kategoris (kode_kategori, nama_kategori) VALUES ('KTG-001', 'Makanan');
INSERT INTO kategoris (kode_kategori, nama_kategori) VALUES ('KTG-002', 'Minuman');
INSERT INTO kategoris (kode_kategori, nama_kategori) VALUES ('KTG-003', 'ATK');
INSERT INTO kategoris (kode_kategori, nama_kategori) VALUES ('KTG-004', 'Atribut');


-- DATA BARANG
-- Makanan
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-SGH-01', 'Indomie Goreng', 'Mie instan goreng rasa original', 1, 50, 3500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-SGM-01', 'Indomie Kuah Ayam Bawang', 'Mie instan kuah rasa ayam bawang', 1, 50, 3500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-MIE-02', 'Mie Sedap Goreng', 'Mie instan goreng rasa original', 1, 40, 3000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-SAT-03', 'Roti Tawar Sari Roti', 'Roti tawar putih 400gr', 1, 20, 12000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('GAD-04', 'Biskuit Roma Kelapa', 'Biskuit kelapa klasik 175gr', 1, 30, 8500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-SOT-05', 'Chitato Sapi Panggang', 'Keripik kentang rasa sapi panggang 63gr', 1, 25, 9000.00);

-- Minuman
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-ESJ-06', 'Aqua 600ml', 'Air mineral 600ml', 2, 48, 4000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-EST-07', 'Teh Botol Sosro', 'Teh manis siap minum 300ml', 2, 40, 5000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-KOF-08', 'Kopi Kapal Api', 'Kopi instan hitam 8 sachet', 2, 35, 12000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-PSD-10', 'Pocari Sweat', 'Pocari Sweat untuk segala kebutuhan anti dehidrasi', 2, 30, 2500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-JUS-11', 'Teh Pucuk Harum', 'Teh manis asli dari dauh pucuk', 2, 30, 2500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-JUS-12', 'Daun Singkong', 'Daun Singkong Asli Jember', 2, 30, 2500.00);

-- Alat Tulis
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('SN-KRP-10', 'Pulpen Standard', 'Pulpen biru/hitam standar', 3, 100, 2000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('SN-PIS-11', 'Pensil 2B', 'Pensil kayu 2B untuk ujian', 3, 80, 1500.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('SN-RES-12', 'Penghapus Standard', 'Penghapus pensil putih', 3, 60, 1000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-REN-13', 'Buku Tulis 38 Lembar', 'Buku tulis spiral 38 lembar', 3, 50, 5000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-AYG-14', 'Buku Catatan A5', 'Buku catatan ukuran A5 100 lembar', 3, 40, 8000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-BKS-15', 'Spidol Whiteboard', 'Spidol whiteboard hitam', 3, 35, 6000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-SUS-16', 'Stabilo Highlighter', 'Pena stabilo berbagai warna', 3, 45, 7000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('SN-LUM-17', 'Lem Kertas Fox', 'Lem kertas 60gr', 3, 30, 5000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('TF-PEK-18', 'Kertas A5', 'Kertas HVS A5 1 rim (500 lembar)', 3, 20, 35000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('MN-DEJ-19', 'Map Plastik', 'Map plastik kancing snap', 3, 40, 3000.00);
INSERT INTO barangs (kode_barang, nama_barang, deskripsi, kategori_id, stok, harga) VALUES ('SN-MAR-20', 'Isolasi Bening', 'Lakban bening 2 inch', 3, 25, 8000.00);

-- Atribut
