// Nama File yg di Input
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

//Sweetalert Notifications
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire({
        title: 'Success !',
        text: flashData,
        icon: 'success'
    })
}

$(document).ready(function() {
  $('.hapus').on('click', function(e) {
    e.preventDefault();
    var id = $(this).val();

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: 'Data yang dihapus tidak dapat dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = '/SuratMasuk/delete/'+id;
      }
    });
  });
});