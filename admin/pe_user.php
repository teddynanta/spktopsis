<?php
include "../koneksi.php";
// echo "<pre>";
// print_r($_FILES);
// print_r($_GET['id']);
// echo "</pre>";
$id = $_GET['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password before storing
$password = $_POST['password'];
$role = $_POST['role'];

if ($password != '') {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  // ambil data file
  $stmt = $koneksi->prepare("UPDATE users SET nama = ?, email = ?, password = ?, role = ? WHERE id = $id");
  $stmt->bind_param("ssss", $nama, $email, $password, $role);
} else {
  // ambil data file
  $stmt = $koneksi->prepare("UPDATE users SET nama = ?, email = ?, role = ? WHERE id = $id");
  $stmt->bind_param("sss", $nama, $email, $role);
}

if ($stmt->execute()) {
  echo "<script>alert('Edit Data Berhasil') </script>";
  echo "<script>window.location.href = \"user.php\" </script>";
} else {
  echo "<script>alert('Edit Data Gagal') </script>";
}
