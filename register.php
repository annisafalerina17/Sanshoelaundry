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

  <title>Register Form</title>
</head>
<body>
  <div class="container">
    <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
      <div class="input-group">
        <input type="text" placeholder="Nama Pengguna" name="nama" required>
      </div>
      <div class="input-group">
        <input type="email" placeholder="Email" name="email" required>
      </div>
      <div class="input-group">
        <input type="password" placeholder="Password" name="password" required>
            </div>
      <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="cpassword"required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="Alamat" name="alamat"required>
      </div>
      <div class="input-group">
        <input type="text" placeholder="No.Telepon" name="telepon"required>
      </div>
      <div class="input-group">
        <button name="submit" class="btn">Register</button>
      </div>
      <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
    </form>
    <?php 
    //jika ada tombol submit(ditekan)
    if (isset($_POST["submit"]))
    {
      //mengambil isian nama,email,password,alamat,telepon
      $nama = $_POST["nama"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $alamat = $_POST["alamat"];
      $telepon = $_POST["telepon"];

      //cek apakah email sudah digunakan
      $ambil = $koneksi->query("SELECT * FROM pengguna WHERE email_pengguna='$email'");
      $yangcocok = $ambil->num_rows;
      if($yangcocok==1)
      {
        echo "<script>alert('pendaftaran gagal, email sudah digunakan'); </script>";
        echo "<script>location='register.php';</script>";
      }
      else
      {
        //query insert ke tabel pengguna
        $koneksi->query("INSERT INTO pengguna (email_pengguna,password_pengguna,nama_pengguna,telepon_pengguna,alamat_pengguna) VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");
        echo "<script>alert('pendaftaran berhasil'); </script>";
        echo "<script>location='login.php';</script>";
      }
    }
    ?>

</body>
</html>