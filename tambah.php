<?php
// Koneksi ke database
include 'koneksi.php';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $email = $_POST['email'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $alamat_rumah = $_POST['alamat_rumah'];
    $program_studi_1 = $_POST['program_studi_1'];
    $program_studi_2 = $_POST['program_studi_2'];

    // Query untuk memasukkan data ke database
    $query = "INSERT INTO pendaftaran_mahasiswa (nama_lengkap, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, email, nomor_handphone, alamat_rumah, program_studi_1, program_studi_2)
              VALUES ('$nama_lengkap', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$email', '$nomor_handphone', '$alamat_rumah', '$program_studi_1', '$program_studi_2')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data mahasiswa berhasil ditambahkan!'); window.location.href = 'table.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menambahkan data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h2 class="text-center">Tambah Data Mahasiswa</h2>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">Nomor Identitas (NIK)</label>
                        <input type="text" class="form-control" name="nik" id="nik" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" name="agama" id="agama" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_handphone">Nomor Handphone</label>
                        <input type="text" class="form-control" name="nomor_handphone" id="nomor_handphone" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_rumah">Alamat Rumah</label>
                <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" required></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="program_studi_1">Program Studi 1</label>
                        <input type="text" class="form-control" name="program_studi_1" id="program_studi_1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="program_studi_2">Program Studi 2</label>
                        <input type="text" class="form-control" name="program_studi_2" id="program_studi_2" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="table.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
