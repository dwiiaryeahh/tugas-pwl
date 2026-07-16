<?php
include '../koneksi.php';

$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id'");

if ($query) {
    echo "Data pegawai berhasil dihapus";
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
