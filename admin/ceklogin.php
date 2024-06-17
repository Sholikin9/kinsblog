<?php 
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
   header('location:login.php');
}
else{

}
?>


<!-- <?php
//session_start();

// Memuatkan file function.php untuk koneksi database dan logika login
// require_once('function.php');

// // Memproses pengiriman form login (jika dikirim)
// if (isset($_POST['btn_login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   // Panggil fungsi login dari function.php
//   $login_berhasil = login($username, $password);

//   if ($login_berhasil) {
//     // Login berhasil, arahkan ke index.php
//     header('Location: ceksession.php');
//     exit();
//   } else {
//     // Login gagal, tampilkan pesan kesalahan
//     echo '<script>alert("Username atau password salah.");</script>';
//   }
// }

// // Arahkan kembali ke login.php jika tidak dikirim atau login gagal
// header('Location: login.php');
// exit();

?> -->