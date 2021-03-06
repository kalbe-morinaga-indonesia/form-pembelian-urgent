let semuaTombol = document.querySelectorAll('.btn-hapus');
semuaTombol.forEach(function(item) {
    item.addEventListener('click',konfirmasi);
})

function konfirmasi(event){
  // Buat pesan error untuk setiap tipe tabel
  let tombol = event.currentTarget;
  let judulAlert;
  let teksAlert;
  switch(tombol.getAttribute('data-table')) {
    case 'department':
      judulAlert = 'Hapus Department '+tombol.getAttribute('data-name')+'?';
      teksAlert  = 'Semua data <b>user</b> untuk department ini juga akan '+
                   'terhapus!';
    break;
    case 'role':
        judulAlert = 'Apakah anda yakin?';
        teksAlert  = 'Hapus Role '+tombol.getAttribute('data-name');
    break;
    case 'permission':
        judulAlert = 'Apakah anda yakin?';
        teksAlert  = 'Hapus Permission '+tombol.getAttribute('data-name');
    break;
    case 'assign-permission':
        judulAlert = 'Apakah anda yakin?';
        teksAlert  = 'Hapus Assign Permission '+tombol.getAttribute('data-name');
    break;
    case 'assign-user':
        judulAlert = 'Apakah anda yakin?';
        teksAlert  = 'Hapus Assign User '+tombol.getAttribute('data-name');
    break;
    default:
      judulAlert = 'Apakah anda yakin?';
      teksAlert  = 'Hapus data <b>'+tombol.getAttribute('data-name')+'</b>';
    break;
  }

  event.preventDefault();
  Swal.fire({
    title: judulAlert,
    html: teksAlert,
    icon: 'warning',
    showCancelButton: true,
    cancelButtonColor: '#6c757d',
    confirmButtonColor: '#dc3545',
    cancelButtonText: 'Tidak jadi',
    confirmButtonText: 'Ya, hapus!',
    reverseButtons: true,
  })
  .then((result) => {
    if (result.value) {
      tombol.parentElement.submit();
    }
  })

}
