<?php
include '../koneksi.php';

$id_jabatan = $_POST['id_jabatan'];
$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];

$query = mysqli_query($koneksi, "UPDATE jabatan SET
    nama_jabatan='$nama_jabatan',
    gaji_pokok='$gaji_pokok'
    WHERE id_jabatan='$id_jabatan'
");

if ($query) {
    echo "Data jabatan berhasil diupdate";
} else {
    echo "Data gagal diupdate: " . mysqli_error($koneksi);
}
?>
