<?php
include '../koneksi.php';

$id_pegawai = $_POST['id_pegawai'];
$nip = $_POST['nip'];
$nama_pegawai = $_POST['nama_pegawai'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$id_jabatan = $_POST['id_jabatan'];
$id_unit = $_POST['id_unit'];

$query = mysqli_query($koneksi, "UPDATE pegawai SET
    nip='$nip',
    nama_pegawai='$nama_pegawai',
    jenis_kelamin='$jenis_kelamin',
    alamat='$alamat',
    no_hp='$no_hp',
    email='$email',
    id_jabatan='$id_jabatan',
    id_unit='$id_unit'
    WHERE id_pegawai='$id_pegawai'
");

if ($query) {
    echo "Data pegawai berhasil diupdate";
} else {
    echo "Data gagal diupdate: " . mysqli_error($koneksi);
}
?>
