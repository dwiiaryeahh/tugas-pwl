<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jabatan - Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Data Jabatan</h1>
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
        <h2>Input Data Jabatan</h2>
        <form id="formTambahJabatan">
            <div class="grid">
                <div>
                    <label>Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" required>
                </div>
                <div>
                    <label>Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" min="0" step="0.01" required>
                </div>
            </div>

            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <div class="card">
        <h2>Data Jabatan Fakultas Teknik</h2>
        <div id="dataJabatan"></div>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
