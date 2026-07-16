<?php
include '../koneksi.php';

$id_unit = $_POST['id_unit'];
$nama_unit = $_POST['nama_unit'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi, "UPDATE unit_kerja SET
    nama_unit='$nama_unit',
    keterangan='$keterangan'
    WHERE id_unit='$id_unit'
");

if ($query) {
    echo "Data unit kerja berhasil diupdate";
} else {
    echo "Data gagal diupdate: " . mysqli_error($koneksi);
}
?>
