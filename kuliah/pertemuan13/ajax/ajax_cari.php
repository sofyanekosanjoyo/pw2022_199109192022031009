<?php

require '../fungsi.php';

$kendaraan = cari_data($_GET['kataKunci']);

?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Merk Kendaraan</th>
    <th>Tipe Kendaraan</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($kendaraan)) : ?>
    <tr>
      <td colspan="5" style="color: red; font-style: italic">Data kendaraan tidak ditemukan</td>
    </tr>
  <?php endif; ?>

  <?php $i = 1;
  foreach ($kendaraan as $detilKendaraan) :
  ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="gambar/<?= $detilKendaraan['gambar']; ?>" width="100" alt=""></td>
      <td><?= $detilKendaraan['merk_kendaraan']; ?></td>
      <td><?= $detilKendaraan['tipe_kendaraan']; ?></td>
      <td>
        <a href="detil.php?id=<?= $detilKendaraan['id']; ?> ">Lihat Detil</a>
      </td>
    </tr>
  <?php endforeach;  ?>

</table>