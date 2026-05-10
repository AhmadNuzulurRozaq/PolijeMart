import Swal from 'sweetalert2';
window.Swal = Swal; // Jadikan global agar bisa dipanggil langsung dari Blade/Livewire

// Konfirmasi Tambah & Update Data (Admin) - Sudah ada di file Anda
const submitForm = document.getElementById('submitForm');
if (submitForm) {
    submitForm.addEventListener('submit', function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pastikan data sudah benar. Apakah Anda ingin lanjut?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#1C4E80',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                submitForm.submit();
            }
        });
    });
}

// Konfirmasi Hapus Data (Admin) - Sudah ada di file Anda
document.addEventListener('submit', function (event) {
    if (event.target && event.target.classList.contains('form-delete')) {
        event.preventDefault();
        const form = event.target; // Simpan referensi form agar tidak hilang di dalam Promise
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Gunakan variabel form
            }
        });
    }
});

// TAMBAHAN: Konfirmasi Checkout (Pembeli)
const checkoutForm = document.getElementById('checkoutForm');
if (checkoutForm) {
    checkoutForm.addEventListener('submit', function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Konfirmasi Pesanan',
            text: "Apakah Anda yakin ingin memproses pesanan ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Checkout Sekarang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                checkoutForm.submit();
            }
        });
    });
}