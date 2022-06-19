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

function cari_data($kataKunci)
{
  $koneksidb = koneksi();

  $query = "SELECT * FROM kendaraan
            WHERE 
            merk_kendaraan LIKE '%$kataKunci%' OR
            tipe_kendaraan LIKE '%$kataKunci%'";
  $hasilQuery = mysqli_query($koneksidb, $query);

  $dataKendaraan = [];

  while ($dataQuery = mysqli_fetch_assoc($hasilQuery)) {
    $dataKendaraan[] = $dataQuery;
  }

  return $dataKendaraan;
}

function login($data)
{
  $koneksidb = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // Cek dulu username
  if ($query = query("SELECT * FROM user WHERE username = '$username'")) {

    // Cek password
    if (password_verify($password, $query['password'])) {

      // Set Session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username atau Password Salah!'
  ];
}


function daftar($data)
{
  $koneksidb = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($koneksidb, $data['password1']);
  $password2 = mysqli_real_escape_string($koneksidb, $data['password2']);

  // Jika username atau password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('Username atau Password tidak boleh kosong!');
          document.location.href = 'daftar.php';
          </script>
        ";

    return false;
  }

  // Jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
          alert('Username sudah terdaftar!');
          document.location.href = 'daftar.php';
          </script>
        ";

    return false;
  }

  // Jika konfirmasi password tidak sama
  if ($password1 !== $password2) {
    echo "<script>
    alert('Konfirmasi Password Tidak Sama!');
    document.location.href = 'daftar.php';
    </script>
  ";

    return false;
  }

  // Jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
    alert('Password Terlalu Pendek!');
    document.location.href = 'daftar.php';
    </script>
  ";

    return false;
  }

  // Jika username dan password sudah sesuai
  // Enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // Insert ke tabel user
  $query = "INSERT INTO user
            VALUES
            (null, '$username', '$password_baru')
            ";

  mysqli_query($koneksidb, $query) or die(mysqli_error($koneksidb));

  return mysqli_affected_rows($koneksidb);
}
