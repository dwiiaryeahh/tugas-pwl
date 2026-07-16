<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jabatan='$id'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jabatan - Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Edit Data Jabatan</h1>
        <p>Dwi Arya Putra | 202343501487 | S6H</p>
        <p>Kepegawaian Fakultas Teknik</p>
    </div>

    <div class="navbar">
        <a href="index.php">Pegawai</a>
        <a class="active" href="jabatan.php">Jabatan</a>
        <a href="unit_kerja.php">Unit Kerja</a>
    </div>

    <div id="notif"></div>

    <div class="card">
        <form id="formEditJabatan">
            <input type="hidden" name="id_jabatan" value="<?= $row['id_jabatan']; ?>">

            <div class="grid">
                <div>
                    <label>Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" value="<?= htmlspecialchars($row['nama_jabatan']); ?>" required>
                </div>
                <div>
                    <label>Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" min="0" step="0.01" value="<?= htmlspecialchars($row['gaji_pokok']); ?>" required>
                </div>
            </div>

            <button type="submit">Update Data</button>
            <a class="btn-back" href="jabatan.php">Kembali</a>
        </form>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
