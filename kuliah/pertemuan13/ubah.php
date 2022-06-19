<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'fungsi.php';

// Jika tidak ada id di URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// Ambil id dari URL
$id = $_GET['id'];

// Query kendaraan berdasarkan id
$kendaraan = query("SELECT * FROM kendaraan WHERE id = $id");

// Apakah tombol ubah sudah diklik
if (isset($_POST['tombol-ubah'])) {
  if (ubah_data($_POST) > 0) {
    echo "<script>
          alert('Data berhasil diubah !!!')
          document.location.href = 'index.php'
          </script>";
  } else {
    echo "<script>
          alert('Data gagal diubah !!!')
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Kendaraan</title>
</head>

<body>
  <h3>Form Ubah Data Kendaraan</h3>

  <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?= $kendaraan['id']; ?>">
    <ul>
      <li>
        <label for="nomor_plat">Nomor Plat :
          <input type="text" name="nomor_plat" id="nomor_plat" autofocus required value="<?= $kendaraan['nomor_plat']; ?>">
        </label>
      </li>
      <li>
        <label for="merk_kendaraan">Merk Kendaraan :
          <input type="text" name="merk_kendaraan" id="merk_kendaraan" autofocus required value="<?= $kendaraan['merk_kendaraan']; ?>">
        </label>
      </li>
      <li>
        <label for="tipe_kendaraan">Tipe Kendaraan :
          <input type="text" name="tipe_kendaraan" id="tipe_kendaraan" autofocus required value="<?= $kendaraan['tipe_kendaraan']; ?>">
        </label>
      </li>
      <li>
        <label for="unit_kerja">Unit Kerja :
          <input type="text" name="unit_kerja" id="unit_kerja" autofocus required value="<?= $kendaraan['unit_kerja']; ?>">
        </label>
      </li>
      <li>
        <label for="email">Email :
          <input type="text" name="email" id="email" autofocus required value="<?= $kendaraan['email']; ?>">
        </label>
      </li>
      <li>
        <label for="gambar">Gambar :
          <input type="hidden" name="gambar_lama" value="<?= $kendaraan['gambar']; ?>">
          <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewGambar()">
        </label>
        <img src="gambar/<?= $kendaraan['gambar']; ?>" width="120" style="display: block;" class="preview-gambar">
      </li>
      <li>
        <button type="submit" name="tombol-ubah">Ubah Data</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>

</body>

</html>