<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM unit_kerja WHERE id_unit='$id'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Unit Kerja - Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Edit Data Unit Kerja</h1>
        <p>Dwi Arya Putra | 202343501487 | S6H</p>
        <p>Kepegawaian Fakultas Teknik</p>
    </div>

    <div class="navbar">
        <a href="index.php">Pegawai</a>
        <a href="jabatan.php">Jabatan</a>
        <a class="active" href="unit_kerja.php">Unit Kerja</a>
    </div>

    <div id="notif"></div>

    <div class="card">
        <form id="formEditUnit">
            <input type="hidden" name="id_unit" value="<?= $row['id_unit']; ?>">

            <label>Nama Unit</label>
            <input type="text" name="nama_unit" value="<?= htmlspecialchars($row['nama_unit']); ?>" required>

            <label>Keterangan</label>
            <textarea name="keterangan"><?= htmlspecialchars($row['keterangan']); ?></textarea>

            <button type="submit">Update Data</button>
            <a class="btn-back" href="unit_kerja.php">Kembali</a>
        </form>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
