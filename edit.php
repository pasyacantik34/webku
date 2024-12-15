<?php
    include "koneksi.php";

    // Get the ID from the URL
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Check if the ID is present
    if (!$id) {
        die("ID tidak ditemukan dalam URL.");
    }

    // Query to select the record based on ID
    $sql = "SELECT * FROM pendaftaran_mahasiswa WHERE id = $id";
    $hasil = mysqli_query($koneksi, $sql); 

    // Check if query execution was successful
    if (!$hasil) {
        die("Query gagal dijalankan: " . mysqli_error($koneksi));
    }

    // Fetch the data if it exists
    if (mysqli_num_rows($hasil) > 0) {
        $data = mysqli_fetch_array($hasil); 
    } else {
        die("Data tidak ditemukan.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card text-left mt-5 mb-5">
                    <div class="card-header text-center">
                        <h1>Edit Biodata</h1>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="post">
                            <!-- Hidden input untuk ID -->
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            
                            <!-- NIK -->
                            <div class="form-group">
                                <label for="nik" class="badge badge-primary">Nomor Identitas (NIK)</label>
                                <input type="text" class="form-control" name="nik" id="nik" 
                                    placeholder="Masukkan NIK" value="<?php echo $data['nik']; ?>" required>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="nama" class="badge badge-primary">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" 
                                    placeholder="Masukkan Nama Lengkap" value="<?php echo $data['nama_lengkap']; ?>" required>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label for="tempat_lahir" class="badge badge-primary">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" 
                                    placeholder="Masukkan Tempat Lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tanggal_lahir" class="badge badge-primary">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" 
                                    value="<?php echo $data['tanggal_lahir']; ?>" required>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status" class="badge badge-primary">Status</label>
                                <input type="text" class="form-control" name="status" id="status" 
                                    placeholder="Masukkan Status" value="<?php echo $data['status']; ?>" required>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-check form-check-inline">
                                <label class="form-check-label mr-5">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" 
                                        <?php if ($data['jenis_kelamin'] == "Laki-Laki") { echo "checked"; } ?>> Laki-Laki
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" 
                                        <?php if ($data['jenis_kelamin'] == "Perempuan") { echo "checked"; } ?>> Perempuan
                                </label>
                            </div>

                            <!-- Agama -->
                            <div class="form-group">
                                <label for="agama" class="badge badge-primary">Agama</label>
                                <select class="form-control" name="agama" id="agama" required>
                                    <option value="Islam" <?php if ($data['agama'] == "Islam") { echo "selected"; } ?>>Islam</option>
                                    <option value="Kristen" <?php if ($data['agama'] == "Kristen") { echo "selected"; } ?>>Kristen</option>
                                    <option value="Katolik" <?php if ($data['agama'] == "Katolik") { echo "selected"; } ?>>Katolik</option>
                                    <option value="Hindu" <?php if ($data['agama'] == "Hindu") { echo "selected"; } ?>>Hindu</option>
                                    <option value="Buddha" <?php if ($data['agama'] == "Buddha") { echo "selected"; } ?>>Buddha</option>
                                    <option value="Konghucu" <?php if ($data['agama'] == "Konghucu") { echo "selected"; } ?>>Konghucu</option>
                                </select>
                            </div>
                             <!-- Email -->
                             <div class="form-group">
                                <label for="email" class="badge badge-primary">Email</label>
                                <input type="email" class="form-control" name="email" id="email" 
                                    placeholder="Masukkan Email" value="<?php echo $data['email']; ?>" required>
                            </div>     
                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat_rumah" class="badge badge-primary">Alamat</label>
                                <textarea class="form-control" name="alamat_rumah" id="alamat_rumah" rows="3" required><?php echo $data['alamat_rumah']; ?></textarea>
                            </div>

                            <!-- Nomor Handphone -->
                            <div class="form-group">
                                <label for="nomor_handphone" class="badge badge-primary">Nomor Handphone</label>
                                <input type="text" class="form-control" name="nomor_handphone" id="nomor_handphone" 
                                    placeholder="Masukkan Nomor Handphone" value="<?php echo $data['nomor_handphone']; ?>" required>
                            </div>

                            <!-- Tahun Lulus -->
                            <div class="form-group">
                                <label for="tahun_lulus" class="badge badge-primary">Tahun Lulus</label>
                                <input type="number" class="form-control" name="tahun_lulus" id="tahun_lulus" 
                                    placeholder="Masukkan Tahun Lulus" value="<?php echo $data['tahun_lulus']; ?>" required>
                            </div>

                            <!-- Program Studi 1 -->
                            <div class="form-group">
                                <label for="program_studi_1" class="badge badge-primary">Program Studi 1</label>
                                <select class="form-control" name="program_studi_1" id="program_studi_1" required>
                                    <option value="Informatika" <?php if ($data['program_studi_1'] == "Informatika") { echo "selected"; } ?>>Informatika</option>
                                    <option value="Sistem Informasi" <?php if ($data['program_studi_1'] == "Sistem Informasi") { echo "selected"; } ?>>Sistem Informasi</option>
                                    <option value="Teknik Mesin" <?php if ($data['program_studi_1'] == "Teknik Mesin") { echo "selected"; } ?>>Teknik Mesin</option>
                                    <option value="Teknik Sipil" <?php if ($data['program_studi_1'] == "Teknik Sipil") { echo "selected"; } ?>>Teknik Sipil</option>
                                </select>
                            </div>

                            <!-- Program Studi 2 -->
                            <div class="form-group">
                                <label for="program_studi_2" class="badge badge-primary">Program Studi 2</label>
                                <select class="form-control" name="program_studi_2" id="program_studi_2" required>
                                    <option value="Informatika" <?php if ($data['program_studi_2'] == "Informatika") { echo "selected"; } ?>>Informatika</option>
                                    <option value="Sistem Informasi" <?php if ($data['program_studi_2'] == "Sistem Informasi") { echo "selected"; } ?>>Sistem Informasi</option>
                                    <option value="Teknik Mesin" <?php if ($data['program_studi_2'] == "Teknik Mesin") { echo "selected"; } ?>>Teknik Mesin</option>
                                    <option value="Teknik Sipil" <?php if ($data['program_studi_2'] == "Teknik Sipil") { echo "selected"; } ?>>Teknik Sipil</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
