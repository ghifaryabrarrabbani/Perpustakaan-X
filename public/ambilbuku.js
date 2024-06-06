<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#id_user').change(function() {
            var selectedUserId = $(this).val();
            if (selectedUserId) {
                // Buat permintaan Ajax ke server untuk mendapatkan daftar buku yang tersedia
                $.ajax({
                    url: '/get-books/' + selectedUserId,
                    type: 'GET',
                    success: function(response) {
                        // Gantilah opsi dalam elemen select buku dengan yang diterima dari server
                        var bookSelect = $('#id_pustaka');
                        bookSelect.empty();
                        bookSelect.append('<option value="" disabled selected>Choose Book</option>');
                        response.forEach(function(book) {
                            bookSelect.append('<option value="' + book.id + '">' + book.judul_buku + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
