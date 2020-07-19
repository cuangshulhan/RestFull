<?php
foreach ($DataEdit['data'] as $row) {
    $id     = $row['id'];
    $nama   = $row['nama'];
    $jk     = $row['jk'];
    $alamat = $row['alamat'];
}
?>

<form method="post" action="<?= base_url() ?>mahasiswa/update">

    <input type="hidden" name="id" value="<?= $id ?>">
    <table width="30%" border="1">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" value="<?= $nama ?>">
            </td>
        </tr>
        <tr>
            <td>jk</td>
            <td>:</td>
            <td>
                <select name="jk" id="">
                    <?php
                    $slc1 = '';
                    $slc2 = '';

                    ($jk == 'laki-laki') ? $slc1 = "selected='selected'" : $slc2 = "selected='selected'";

                    ?>
                    <option <?= $slc1 ?> value="laki-laki">laki-laki</option>
                    <option <?= $slc2 ?> value="perempuan">perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>alamat</td>
            <td>:</td>
            <td>
                <textarea name="alamat" id="" cols="30" rows="2"><?= $alamat ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="submit" value="Update">
            </td>
        </tr>
    </table>
</form>

<table width="70%" border="1">
    <tr>
        <td>No</td>
        <td>Id</td>
        <td>Nama</td>
        <td>Nomor</td>
        <td>Alamat</td>
        <td>Action</td>
    </tr>

    <?php
    $no = 0;
    foreach ($RowData['data'] as $row) {
        $no++;
    ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jk']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="<?= base_url() ?>mahasiswa/edit/<?= $row['id']; ?>">
                    <button>Edit</button>
                </a>
                |
                <a href="<?= base_url() ?>mahasiswa/delete/<?= $row['id']; ?>">
                    <button>Delete</button>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>