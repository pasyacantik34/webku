<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Jika session tidak ada, redirect ke halaman login
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - CampusData</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo">CampusData</div>
    <nav>
      <ul>
        <li>
          <form action="logout.php" method="POST">
            <button class="btn btn-danger" type="submit">Log Out</button>
          </form>
        </li>
      </ul>
    </nav>
  </header>
  <h1>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
  <a href="table.php">Lihat Data Mahasiswa</a>
</body>
</html>
