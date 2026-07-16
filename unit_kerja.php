<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Unit Kerja - Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Data Unit Kerja</h1>
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
        <h2>Input Data Unit Kerja</h2>
        <form id="formTambahUnit">
            <label>Nama Unit</label>
            <input type="text" name="nama_unit" required>

            <label>Keterangan</label>
            <textarea name="keterangan"></textarea>

            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <div class="card">
        <h2>Data Unit Kerja Fakultas Teknik</h2>
        <div id="dataUnit"></div>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
