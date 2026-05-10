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

document.addEventListener('submit', function (event) {
    if (event.target && event.target.classList.contains('form-delete')) {
        event.preventDefault();

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
                event.target.submit();
            }
        });
    }
});