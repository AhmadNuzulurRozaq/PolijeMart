@extends('layouts.sidebar')

@section('title', 'Inventory - Polije Mart')

@section('content')

{{-- <head>
    <style type="text/tailwindcss">
        *{
            border: 1px solid red;
        }
    </style>
</head> --}}

<livewire:inventory-table />

<script>
    function showDetail(id){
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');
        modal.classList.remove('hidden');

        // Memberikan jeda agar browser memproses penghapusan 'hidden' sebelum memulai animasi
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            modalContent.classList.remove('opacity-0', 'scale-95');
            modalContent.classList.add('opacity-100', 'scale-100');
        }, 10);

        fetch(`/inventory/showData/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalKode').innerText = data.kode_barang;
                document.getElementById('modalNama').innerText = data.nama_barang;
                document.getElementById('modalKategori').innerText = data.kategori ? data.kategori.nama_kategori : (data.nama_kategori || '-');
                document.getElementById('modalHarga').innerText = data.harga;
                document.getElementById('modalStok').innerText = data.stok;
                
                const imgElement = document.getElementById('modalGambar');
                if (data.image) {
                    imgElement.src = `{{ asset('storage') }}/${data.image}`;
                    imgElement.classList.remove('hidden');
                } else {
                    imgElement.src = '';
                    imgElement.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Error fetching data : ', error);
                alert('Gagal mengambil data barang');
            });
    }

    function closeModal(){
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        modalContent.classList.remove('opacity-100', 'scale-100');
        modalContent.classList.add('opacity-0', 'scale-95');
        
        // Tunggu 300ms (sesuai duration-300) hingga animasi transisi selesai sebelum menambahkan class hidden
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>


@endsection