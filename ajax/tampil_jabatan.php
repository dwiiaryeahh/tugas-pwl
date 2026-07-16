<?php
include '../koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY id_jabatan DESC");
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama_jabatan']); ?></td>
            <td>Rp <?= number_format($row['gaji_pokok'], 0, ',', '.'); ?></td>
            <td>
                <a class="btn-edit" href="edit_jabatan.php?id=<?= $row['id_jabatan']; ?>">Edit</a>
                <button class="btn-hapus-jabatan" data-id="<?= $row['id_jabatan']; ?>">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
