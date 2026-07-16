<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pegawai - Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Edit Data Pegawai</h1>
        <p>Dwi Arya Putra | 202343501487 | S6H</p>
        <p>Kepegawaian Fakultas Teknik</p>
    </div>

    <div class="navbar">
        <a class="active" href="index.php">Pegawai</a>
        <a href="jabatan.php">Jabatan</a>
        <a href="unit_kerja.php">Unit Kerja</a>
    </div>

    <div id="notif"></div>

    <div class="card">
        <form id="formEdit">
            <input type="hidden" name="id_pegawai" value="<?= $row['id_pegawai']; ?>">

            <div class="grid">
                <div>
                    <label>NIP</label>
                    <input type="text" name="nip" value="<?= htmlspecialchars($row['nip']); ?>" required>
                </div>
                <div>
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" value="<?= htmlspecialchars($row['nama_pegawai']); ?>" required>
                </div>
                <div>
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="L" <?= $row['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?= $row['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>No HP</label>
                    <input type="text" name="no_hp" value="<?= htmlspecialchars($row['no_hp']); ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($row['email']); ?>">
                </div>
                <div>
                    <label>Tanggal Edit</label>
                    <input type="text" id="tanggal_edit" placeholder="Pilih tanggal">
                </div>
                <div>
                    <label>Jabatan</label>
                    <select name="id_jabatan" required>
                        <?php
                        $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
                        while ($j = mysqli_fetch_assoc($jabatan)) {
                            $selected = $row['id_jabatan'] == $j['id_jabatan'] ? 'selected' : '';
                            echo "<option value='".$j['id_jabatan']."' $selected>".$j['nama_jabatan']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Unit Kerja</label>
                    <select name="id_unit" required>
                        <?php
                        $unit = mysqli_query($koneksi, "SELECT * FROM unit_kerja ORDER BY nama_unit ASC");
                        while ($u = mysqli_fetch_assoc($unit)) {
                            $selected = $row['id_unit'] == $u['id_unit'] ? 'selected' : '';
                            echo "<option value='".$u['id_unit']."' $selected>".$u['nama_unit']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label>Alamat</label>
            <textarea name="alamat"><?= htmlspecialchars($row['alamat']); ?></textarea>

            <button type="submit">Update Data</button>
            <a class="btn-back" href="index.php">Kembali</a>
        </form>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
