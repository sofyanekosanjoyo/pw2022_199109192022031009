<?php

require 'fungsi.php';

// Tampung datanya ke variabel kendaraan
$kendaraan = query("SELECT * FROM kendaraan");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="
  <meta http-equiv=" X-UA-Compatible" content="IE=edge">

</head>

<body>
  <h3>Daftar Kendaraan</h3>

  <a href="tambah.php">Tambah Data Kendaraan</a>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Merk Kendaraan</th>
      <th>Tipe Kendaraan</th>
      <th>Aksi</th>
    </tr>

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
</body>

</html>