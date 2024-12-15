<?php
include "koneksi.php";

// Query untuk mendapatkan data dari tabel pendaftaran_mahasiswa
$sql = "SELECT * FROM pendaftaran_mahasiswa";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJYMQ9aG93oMZm7JXvw5+J9U9s0fXH+dxIbXwEKzPbaDwSYz4O2SbmXZ+X9z" crossorigin="anonymous">
    
    <!-- Menambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
 /* Perbaikan Layout untuk Tabel */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Tabel Styling */
table {
    width: 100%;
    border-collapse: collapse;
    background: linear-gradient(135deg, #a1c4fd, #c2e9fb); /* Gradasi biru muda ke biru langit */
    border-radius: 8px;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #333; /* Warna teks abu gelap agar lebih nyaman dibaca */
}

table th {
    background-color: #6ec1e4; /* Biru muda untuk header */
    color: white; /* Warna teks header menjadi putih */
    font-weight: bold;
}

table tbody tr:hover {
    background-color: #f1f9ff; /* Efek hover dengan warna biru muda yang lebih terang */
}

.btn {
    font-size: 18px;
    padding: 6px 10px;
    border-radius: 8px;
    margin: 5px; /* Memberikan jarak antar tombol */
}

.btn-success {
    background-color: #28a745;
    color: #fff;
}

.btn-danger {
    background-color: #dc3545;
    color: #fff;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
}

.btn:hover {
    opacity: 0.9;
}

/* Layout Responsif */
@media (max-width: 992px) {
    table {
        font-size: 14px;
    }
}

@media (max-width: 768px) {
    table {
        font-size: 12px;
    }
}

/* Posisikan Logout di Pojok Kanan Bawah */
.logout-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #6c757d;
    color: #fff;
    font-size: 18px;
    padding: 10px;
    border-radius: 50%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background-color: #5a6268;
    transform: scale(1.1);
}

/* Menambahkan jarak antar tombol aksi */
.btn-action {
    display: inline-block;
    margin-right: 8px; /* Memberikan jarak antar ikon */
}


    </style>
</head>

<body>
<div class="container">
    <h2 class="text-center mb-4">Data Mahasiswa</h2>

    <?php
    if ($jumlah > 0) {
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Nomor Identitas</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Nomor Handphone</th>
                    <th>Alamat Rumah</th>
                    <th>Asal Sekolah</th>
                    <th>Program Studi 1</th>
                    <th>Program Studi 2</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <tr>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['tempat_lahir']; ?>, <?php echo $data['tanggal_lahir']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['nomor_handphone']; ?></td>
                        <td><?php echo $data['alamat_rumah']; ?></td>
                        <td><?php echo $data['asal_sekolah']; ?></td>
                        <td><?php echo $data['program_studi_1']; ?></td>
                        <td><?php echo $data['program_studi_2']; ?></td>
                        <td class="d-flex">
                            <!-- Ikon Tambah -->
                            <a href="tambah.php" class="btn btn-success btn-action">
                                <i class="fas fa-plus"></i>
                            </a>  
                            <!-- Ikon Hapus -->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <!-- Ikon Edit -->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm btn-action">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="alert-warning text-center" role="alert">
            Tidak ada data yang tersedia.
        </div>
        <?php
    }
    ?>
</div>

<!-- Ikon Logout di Pojok Kanan Bawah -->
<a href="logout.php" class="logout-btn">
    <i class="fas fa-sign-out-alt"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7YV7L6o0GxV1w56v54FgxHcDixMRAQ+8lz5E7OsZjTxC3AZXxrfoLMjfDJzFse43" crossorigin="anonymous"></script>
</body>

</html>
