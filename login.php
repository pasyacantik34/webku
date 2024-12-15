<?php
// Sertakan file koneksi
require 'koneksi.php';

// Periksa jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Query untuk memeriksa username dan password
    $stmt = $koneksi->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    if ($stmt) {
        $stmt->bind_param('ss', $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Login berhasil!"); window.location.href="dashboard.html";</script>';
        } else {
            echo '<script>alert("Username atau password salah."); window.history.back();</script>';
        }
    } else {
        die('Kesalahan pada query: ' . $koneksi->error);
    }
}
?>
