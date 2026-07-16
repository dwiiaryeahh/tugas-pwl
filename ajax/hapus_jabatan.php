<?php
include '../koneksi.php';

$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan='$id'");

if ($query) {
    echo "Data jabatan berhasil dihapus";
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
