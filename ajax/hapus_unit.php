<?php
include '../koneksi.php';

$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM unit_kerja WHERE id_unit='$id'");

if ($query) {
    echo "Data unit kerja berhasil dihapus";
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
