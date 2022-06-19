<?php

require 'fungsi.php';

if (isset($_POST['tombol-daftar'])) {

  if (daftar($_POST) > 0) {
    echo "<script>
          alert('User baru berhasil ditambahkan, silahkan login!');
          document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
          alert('User baru gagal ditambahkan');
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
  <title>Daftar User</title>
</head>

<body>
  <h3>Form Pendaftaran User</h3>

  <form method="post" action="">
    <ul>
      <li><label for="username">Username :</label>
        <input type="text" name="username" id="username" autofocus autocomplete="off" required>
      </li>
      <li>
        <label for="password1">Password :</label>
        <input type="password" name="password1" id="password1" autofocus autocomplete="off" required>
      </li>
      <li>
        <label for="password2">Konfirmasi Password :</label>
        <input type="password" name="password2" id="password2" autofocus autocomplete="off" required>
      </li>
      <li>
        <button type="submit" name="tombol-daftar">Daftar</button>
      </li>
    </ul>
  </form>
</body>

</html>