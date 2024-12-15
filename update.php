<?php
include "koneksi.php";  // Pastikan file koneksi.php sudah benar

// Mengambil data dari form
$id = $_POST['id'];
$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$status = $_POST['status'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$email = $_POST['email'];
$nomor_handphone = $_POST['nomor_handphone'];
$alamat_rumah = $_POST['alamat_rumah'];
$program_studi_1 = $_POST['program_studi_1'];
$program_studi_2 = $_POST['program_studi_2'];

// Menyusun query SQL untuk memperbarui data ke database
$sql = "UPDATE pendaftaran_mahasiswa 
        SET nama_lengkap = '$nama_lengkap', nik = '$nik', tempat_lahir = '$tempat_lahir', 
            tanggal_lahir = '$tanggal_lahir', status = '$status', jenis_kelamin = '$jenis_kelamin', 
            agama = '$agama', email = '$email', nomor_handphone = '$nomor_handphone', 
            alamat_rumah = '$alamat_rumah', program_studi_1 = '$program_studi_1', 
            program_studi_2 = '$program_studi_2' 
        WHERE id = $id";

// Mengeksekusi query
if (mysqli_query($koneksi, $sql)) {
    echo "Data Berhasil di Update";
    echo "<br><a href='table.php'>Lihat Data Table</a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
