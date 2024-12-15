<?php

include "koneksi.php";

// Mengambil parameter id dari URL
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan id
$sql = "DELETE FROM pendaftaran_mahasiswa WHERE id = $id";

// Menjalankan query dan mengecek apakah berhasil
if (mysqli_query($koneksi, $sql)) {
    ?>
        <script>
            // Mengarahkan ulang ke halaman table.php setelah data berhasil dihapus
            document.location.href = "table.php";
        </script>
    <?php
} else {
    // Menampilkan pesan error jika penghapusan gagal
    echo "Data Gagal Dihapus: " . $sql . "<br>" . mysqli_error($koneksi);
}

?>
