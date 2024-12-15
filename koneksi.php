<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pendaftaran_mahasiswa';
$port = 3306;

$koneksi = new mysqli($host, $username, $password, $dbname, $port);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Menetapkan charset ke UTF-8
$koneksi->set_charset("utf8");
?>
