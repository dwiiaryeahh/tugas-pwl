<?php
include '../koneksi.php';

$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];

$query = mysqli_query($koneksi, "INSERT INTO jabatan 
(nama_jabatan, gaji_pokok)
VALUES
('$nama_jabatan', '$gaji_pokok')");

if ($query) {
    echo "Data jabatan berhasil disimpan";
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}
?>
