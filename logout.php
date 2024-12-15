<?php
// Mulai session
session_start();

// Hancurkan semua sesi yang ada
session_destroy();

// Alihkan ke halaman login setelah logout
header("Location: login.html");
exit();
?>
