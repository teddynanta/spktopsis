<?php
include "koneksi.php";
// echo "<pre>";
// print_r($_FILES);
// print_r($_GET['id']);
// echo "</pre>";
$id = $_GET['id'];
$uid = $_GET['uid'];
// ambil data file
$namaFile = $_FILES[$id]['name'];
$namaSementara = $_FILES[$id]['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "uploads/";
$lokasi = $dirUpload . $namaFile;
// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
$stmt = $koneksi->prepare("UPDATE users SET $id = ? WHERE id = ?");
$stmt->bind_param("si", $lokasi, $uid);

if ($terupload && $stmt->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  echo "<script>window.location.href = \"profil.php\" </script>";
} else {
  echo "Upload Gagal!";
}
