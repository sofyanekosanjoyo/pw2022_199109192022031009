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

function upload_gambar()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error_file = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // Ketika tidak ada gambar yang dipilih
  if ($error_file == 4) {
    // echo "<script>
    //       alert('Gambar tidak boleh kosong!');
    //       </script>
    //     ";

    return 'nophoto.jpg';
  }

  // Cek ektensi file
  $format_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $format_gambar)) {
    echo "<script>
          alert('Yang anda upload bukan file gambar!');
          </script>
        ";

    return false;
  }

  // Cek tipe file
  if ($tipe_file !== 'image/jpeg' && $tipe_file !== 'image/jpg' && $tipe_file !== 'image/png') {
    echo "<script>
          alert('Yang anda upload bukan file gambar!');
          </script>
        ";

    return false;
  }

  // Cek ukuran file
  // Maksimal 5MB = 5.000.000 byte
  if ($ukuran_file > 5000000) {
    echo "<script>
          alert('Ukuran file terlalu besar!');
          </script>
          ";

    return false;
  }

  // Lolos pengecekan
  // Siap upload file
  // Generate nama file gambar baru supaya unik
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'gambar/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah_data($data)
{
  $koneksidb = koneksi();

  $merk_kendaraan = htmlspecialchars($data['merk_kendaraan']);
  $tipe_kendaraan = htmlspecialchars($data['tipe_kendaraan']);
  $nomor_plat = htmlspecialchars($data['nomor_plat']);
  $unit_kerja = htmlspecialchars($data['unit_kerja']);
  //$gambar = htmlspecialchars($data['gambar']);
  $email = htmlspecialchars($data['email']);

  // Upload gambar
  $gambar = upload_gambar();

  // Cek jika gambarnya kosong
  if (!$gambar) {
    return false;
  }

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

  // Menghapus gambar di folder gambar
  $kendaraan = query("SELECT * FROM kendaraan WHERE id = $id");
  if ($kendaraan['gambar'] != 'nophoto.jpg') {
    unlink('gambar/' . $kendaraan['gambar']);
  }


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
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $email = htmlspecialchars($data['email']);

  $gambar = upload_gambar();
  if (!$gambar) {
    // return false;
    $gambar = 'nophoto.jpg';
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }

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
