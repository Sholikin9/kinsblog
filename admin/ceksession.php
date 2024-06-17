<?php
//session_start();

// Periksa apakah variabel sesi username sudah diatur
if (isset($_SESSION['username'])) {
  // Pengguna sudah login, tampilkan pesan sukses atau arahkan ke halaman yang diinginkan
  // echo 'Anda sudah login sebagai ' . $_SESSION['username'];
  // Anda dapat mengganti ini dengan pengarahan ke halaman tertentu setelah verifikasi login
  // header('Location: index.php');
} else {
  // Pengguna belum login, arahkan ke halaman login
  header('Location: login.php');
  exit();
}
