<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'fungsi.php';

// Ambil id dari URL
$id = $_GET['id'];

// Query kendaraan berdasarkan id
$kendaraan = query("SELECT * FROM kendaraan WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detil Kendaraan</title>
</head>

<body>
  <h3>Detil Kendaraan</h3>
  <ul>
    <li><img src="gambar/<?= $kendaraan['gambar']; ?>" alt="" width="250"></li>
    <li>Nomor Plat : <?= $kendaraan['nomor_plat']; ?> </li>
    <li>Merk Kendaraan : <?= $kendaraan['merk_kendaraan']; ?> </li>
    <li>Tipe Kendaraan : <?= $kendaraan['tipe_kendaraan']; ?> </li>
    <li>Unit Kerja : <?= $kendaraan['unit_kerja']; ?> </li>
    <li>Email : <?= $kendaraan['email']; ?> </li>
    <li><a href="ubah.php?id=<?= $kendaraan['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $kendaraan['id']; ?>" onclick="return confirm('Apakah anda yakin?')">Hapus</a></li>
    <li><a href="index.php">Kembali ke Daftar Kendaraan</a></li>
  </ul>
</body>

</html>