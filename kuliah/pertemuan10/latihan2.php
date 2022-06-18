<?php

require 'fungsi.php';

// Tampung datanya ke variabel kendaraan
$kendaraan = query("SELECT * FROM kendaraan");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Kendaraan</title>
</head>

<body>
  <h3>Daftar Kendaraan</h3>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nomor Plat</th>
      <th>Merk Kendaraan</th>
      <th>Tipe Kendaraan</th>
      <th>Unit Kerja</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($kendaraan as $detilKendaraan) :
    ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="gambar/<?= $detilKendaraan['gambar']; ?>" width="100" alt=""></td>
        <td><?= $detilKendaraan['nomor_plat']; ?></td>
        <td><?= $detilKendaraan['merk_kendaraan']; ?></td>
        <td><?= $detilKendaraan['tipe_kendaraan']; ?></td>
        <td><?= $detilKendaraan['unit_kerja']; ?></td>
        <td><?= $detilKendaraan['email']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach;  ?>

  </table>
</body>

</html>