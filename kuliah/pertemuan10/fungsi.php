<?php

function koneksi()
{
  // Koneksi ke database
  return mysqli_connect('localhost', 'root', '', 'dbkendaraandinas');
}

function query($query)
{
  $koneksidb = koneksi();

  // Query isi tabel kendaraan
  $hasilQuery = mysqli_query($koneksidb, $query);

  // Jika hasilnya hanya 1 baris data
  if (mysqli_num_rows($hasilQuery) == 1) {
    return mysqli_fetch_assoc($hasilQuery);
  }

  // Ubah datanya ke dalam array
  $dataKendaraan = [];

  while ($dataQuery = mysqli_fetch_assoc($hasilQuery)) {
    $dataKendaraan[] = $dataQuery;
  }

  return $dataKendaraan;
}
