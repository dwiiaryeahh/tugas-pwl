<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kepegawaian Fakultas Teknik</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Kepegawaian Fakultas Teknik</h1>
        <p>Dwi Arya Putra | 202343501487 | S6H</p>
    </div>

    <div id="notif"></div>

    <div class="card">
        <h2>Input Data Pegawai</h2>
        <form id="formTambah">
            <div class="grid">
                <div>
                    <label>NIP</label>
                    <input type="text" name="nip" required>
                </div>
                <div>
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" required>
                </div>
                <div>
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label>No HP</label>
                    <input type="text" name="no_hp">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Tanggal Input</label>
                    <input type="text" id="tanggal_input" placeholder="Pilih tanggal">
                </div>
                <div>
                    <label>Jabatan</label>
                    <select name="id_jabatan" required>
                        <option value="">-- Pilih Jabatan --</option>
                        <?php
                        $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
                        while ($j = mysqli_fetch_assoc($jabatan)) {
                            echo "<option value='".$j['id_jabatan']."'>".$j['nama_jabatan']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Unit Kerja</label>
                    <select name="id_unit" required>
                        <option value="">-- Pilih Unit --</option>
                        <?php
                        $unit = mysqli_query($koneksi, "SELECT * FROM unit_kerja ORDER BY nama_unit ASC");
                        while ($u = mysqli_fetch_assoc($unit)) {
                            echo "<option value='".$u['id_unit']."'>".$u['nama_unit']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <label>Alamat</label>
            <textarea name="alamat"></textarea>

            <button type="submit">Simpan Data</button>
        </form>
    </div>

    <div class="card">
        <h2>Data Pegawai Fakultas Teknik</h2>
        <div id="dataPegawai"></div>
    </div>
</div>

<script src="./jquery.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
