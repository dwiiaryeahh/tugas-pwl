<?php
include '../koneksi.php';

$nip = $_POST['nip'];
$nama_pegawai = $_POST['nama_pegawai'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$id_jabatan = $_POST['id_jabatan'];
$id_unit = $_POST['id_unit'];

$query = mysqli_query($koneksi, "INSERT INTO pegawai 
(nip, nama_pegawai, jenis_kelamin, alamat, no_hp, email, id_jabatan, id_unit)
VALUES
('$nip', '$nama_pegawai', '$jenis_kelamin', '$alamat', '$no_hp', '$email', '$id_jabatan', '$id_unit')");

if ($query) {
    echo "Data pegawai berhasil disimpan";
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}
?>
