<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'fungsi.php';

// Ketika tombol login diklik
if (isset($_POST['tombol-login'])) {
  $login = login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Form Login</h3>

  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
  <?php endif; ?>

  <form method="post" action="">
    <ul>
      <li><label for="username">Username :</label>
        <input type="text" name="username" id="username" autofocus autocomplete="off" required>
      </li>
      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" autofocus autocomplete="off" required>
      </li>
      <li>
        <button type="submit" name="tombol-login">Login</button>
      </li>
      <br>
      <li>
        <a href="daftar.php">Daftar</a>
      </li>
    </ul>
  </form>
</body>

</html>