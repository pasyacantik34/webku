<?php
include "koneksi.php";  // Pastikan file koneksi.php sudah benar

// Mengambil data dari form
$nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
$tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
$tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
$agama = isset($_POST['agama']) ? $_POST['agama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$nomor_handphone = isset($_POST['nomor_handphone']) ? $_POST['nomor_handphone'] : '';
$alamat_rumah = isset($_POST['alamat_rumah']) ? $_POST['alamat_rumah'] : '';
$program_studi_1 = isset($_POST['program_studi_1']) ? $_POST['program_studi_1'] : '';
$program_studi_2 = isset($_POST['program_studi_2']) ? $_POST['program_studi_2'] : '';

// Menyusun query SQL untuk memasukkan data ke database
$sql = "INSERT INTO pendaftaran_mahasiswa (nama_lengkap, nik, tempat_lahir, tanggal_lahir, status, jenis_kelamin, agama, email, nomor_handphone, alamat_rumah, program_studi_1, program_studi_2)
        VALUES ('$nama_lengkap', '$nik', '$tempat_lahir', '$tanggal_lahir', '$status', '$jenis_kelamin', '$agama', '$email', '$nomor_handphone', '$alamat_rumah', '$program_studi_1', '$program_studi_2')";

// Mengeksekusi query
if (mysqli_query($koneksi, $sql)) {
    echo "Data Berhasil di Simpan";
    echo "<br><a href='table.php'>Lihat Data Table</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
