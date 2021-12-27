<?php 
session_start();
//koneksi
$koneksi = new mysqli("localhost", "root", "", "sanshoelaundry");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="login.css">

  <title>Login Form</title>
</head>
<body>
  <div class="container">
    <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login Here</p>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <div class="input-group">
        <button type="submit" name="simpan" class="btn">Login</button>
      </div>
      <p class="login-register-text">Don't have an account? <a href="register.php"> Register Here. </a></p>
    </form>
    <?php
    //jika tombol login di tekan
    if (isset($_POST['simpan']))
    {
      $email = $_POST["email"];
      $password = $_POST["password"];
      //melakukan query ngecek akun
        $ambil = $koneksi->query("SELECT * FROM pengguna WHERE email_pengguna='$email' AND password_pengguna='$password'");

        //menghitung akun yg diambil
        $akunyangcocok = $ambil->num_rows;

        //jika 1 akun yang cocok maka bisa login
        if ($akunyangcocok==1)
        {
          //anda sudah login
          //akun dlm bentuk array
          $akun = $ambil->fetch_assoc();
          //simpan di session pengguna
          $_SESSION["pengguna"] = $akun;
          echo "<script>alert('anda berhasil login');</script>";
          echo "<script>location='index.php';</script>";
        }
        else
        {
          //anda gagal login
          echo "<script>alert('anda gagal login, periksa email dan password anda');</script>";
          echo "<script>location='login.php';</script>";
        }




    }
    ?>
</body>
</html>