<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'fungsi.php';

// Tampung datanya ke variabel kendaraan
$kendaraan = query("SELECT * FROM kendaraan");

// Ketika tombol cari di klik
if (isset($_POST['tombol-cari'])) {
  $kendaraan = cari_data($_POST['kata_kunci']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="
  <meta http-equiv=" X-UA-Compatible" content="IE=edge">

</head>

<body>
  <a href="logout.php">Logout</a>

  <h3>Daftar Kendaraan</h3>

  <a href="tambah.php">Tambah Data Kendaraan</a>
  <br><br>

  <form method="post" action="">
    <input type="text" name="kata_kunci" size="40" placeholder="Masukkan kata pencarian" autocomplete="off" autofocus>
    <button type="submit" name="tombol-cari">Cari</button>
  </form>
  <br>

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
</body>

</html>