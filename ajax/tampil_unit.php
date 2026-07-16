<?php
include '../koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM unit_kerja ORDER BY id_unit DESC");
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Unit</th>
            <th>Keterangan</th>
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
            <td><?= htmlspecialchars($row['nama_unit']); ?></td>
            <td><?= htmlspecialchars($row['keterangan']); ?></td>
            <td>
                <a class="btn-edit" href="edit_unit.php?id=<?= $row['id_unit']; ?>">Edit</a>
                <button class="btn-hapus-unit" data-id="<?= $row['id_unit']; ?>">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
