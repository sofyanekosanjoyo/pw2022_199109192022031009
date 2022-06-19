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

function tambah_data($data)
{
  $koneksidb = koneksi();

  $merk_kendaraan = htmlspecialchars($data['merk_kendaraan']);
  $tipe_kendaraan = htmlspecialchars($data['tipe_kendaraan']);
  $nomor_plat = htmlspecialchars($data['nomor_plat']);
  $unit_kerja = htmlspecialchars($data['unit_kerja']);
  $gambar = htmlspecialchars($data['gambar']);
  $email = htmlspecialchars($data['email']);

  $query = "INSERT INTO 
            kendaraan
            VALUES
            (null, '$merk_kendaraan', '$tipe_kendaraan', '$nomor_plat', '$unit_kerja', '$gambar', '$email');
            ";

  mysqli_query($koneksidb, $query) or die(mysqli_error($koneksidb));
  echo mysqli_error($koneksidb);

  return mysqli_affected_rows($koneksidb);
}

function hapus_data($id)
{
  $koneksidb = koneksi();


  $query = "DELETE FROM 
            kendaraan
            WHERE
            id = $id
            ";
  mysqli_query($koneksidb, $query) or die(mysqli_error($koneksidb));

  return mysqli_affected_rows($koneksidb);
}

function ubah_data($data)
{
  $koneksidb = koneksi();

  $id = htmlspecialchars($data['id']);
  $merk_kendaraan = htmlspecialchars($data['merk_kendaraan']);
  $tipe_kendaraan = htmlspecialchars($data['tipe_kendaraan']);
  $nomor_plat = htmlspecialchars($data['nomor_plat']);
  $unit_kerja = htmlspecialchars($data['unit_kerja']);
  $gambar = htmlspecialchars($data['gambar']);
  $email = htmlspecialchars($data['email']);

  $query = "UPDATE kendaraan SET
            merk_kendaraan = '$merk_kendaraan', 
            tipe_kendaraan = '$tipe_kendaraan',
            nomor_plat = '$nomor_plat',
            unit_kerja = '$unit_kerja',
            gambar = '$gambar',
            email = '$email'
            WHERE id = $id";

  mysqli_query($koneksidb, $query) or die(mysqli_error($koneksidb));
  echo mysqli_error($koneksidb);

  return mysqli_affected_rows($koneksidb);
}
