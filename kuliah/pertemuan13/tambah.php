<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'fungsi.php';

// Apakah tombol tambah sudah diklik
if (isset($_POST['tombol-tambah'])) {
  if (tambah_data($_POST) > 0) {
    echo "<script>
          alert('Data berhasil ditambahkan !!!')
          document.location.href = 'index.php'
          </script>";
  } else {
    echo "<script>
          alert('Data gagal ditambahkan !!!')
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
  <title>Tambah Data Kendaraan</title>
</head>

<body>
  <h3>Form Tambah Data Kendaraan</h3>

  <form method="post" action="" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nomor_plat">Nomor Plat :
          <input type="text" name="nomor_plat" id="nomor_plat" autofocus required>
        </label>
      </li>
      <li>
        <label for="merk_kendaraan">Merk Kendaraan :
          <input type="text" name="merk_kendaraan" id="merk_kendaraan" autofocus required>
        </label>
      </li>
      <li>
        <label for="tipe_kendaraan">Tipe Kendaraan :
          <input type="text" name="tipe_kendaraan" id="tipe_kendaraan" autofocus required>
        </label>
      </li>
      <li>
        <label for="unit_kerja">Unit Kerja :
          <input type="text" name="unit_kerja" id="unit_kerja" autofocus required>
        </label>
      </li>
      <li>
        <label for="email">Email :
          <input type="text" name="email" id="email" autofocus required>
        </label>
      </li>
      <li>
        <label for="gambar">Gambar :
          <input type="file" name="gambar" id="gambar" class="gambar" onchange="previewGambar()">
        </label>
        <img src="gambar/nophoto.jpg" width="120" style="display: block;" class="preview-gambar">
      </li>
      <li>
        <button type="submit" name="tombol-tambah">Tambah Data</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>
</body>

</html>