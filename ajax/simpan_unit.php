<?php
include '../koneksi.php';

$nama_unit = $_POST['nama_unit'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "INSERT INTO unit_kerja 
(nama_unit, keterangan)
VALUES
('$nama_unit', '$keterangan')");

if ($query) {
    echo "Data unit kerja berhasil disimpan";
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}
?>
