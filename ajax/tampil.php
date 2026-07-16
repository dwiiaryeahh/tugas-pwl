<?php
include '../koneksi.php';

$query = mysqli_query($koneksi, "
    SELECT 
        pegawai.*,
        jabatan.nama_jabatan,
        jabatan.gaji_pokok,
        unit_kerja.nama_unit
    FROM pegawai
    LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
    LEFT JOIN unit_kerja ON pegawai.id_unit = unit_kerja.id_unit
    ORDER BY pegawai.id_pegawai DESC
");
?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>JK</th>
            <th>Jabatan</th>
            <th>Unit Kerja</th>
            <th>Gaji Pokok</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Alamat</th>
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
            <td><?= htmlspecialchars($row['nip']); ?></td>
            <td><?= htmlspecialchars($row['nama_pegawai']); ?></td>
            <td><?= $row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td><?= htmlspecialchars($row['nama_jabatan']); ?></td>
            <td><?= htmlspecialchars($row['nama_unit']); ?></td>
            <td>Rp <?= number_format($row['gaji_pokok'], 0, ',', '.'); ?></td>
            <td><?= htmlspecialchars($row['no_hp']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a class="btn-edit" href="edit.php?id=<?= $row['id_pegawai']; ?>">Edit</a>
                <button class="btn-hapus" data-id="<?= $row['id_pegawai']; ?>">Hapus</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
