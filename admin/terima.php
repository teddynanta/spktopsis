<?php
include "../koneksi.php";
// echo "<pre>";
// print_r($_FILES);
// print_r($_GET['id']);
// echo "</pre>";
$id = $_GET['id'];
// ambil data file
$stmt = $koneksi->prepare("UPDATE tab_pengajuan SET status = 'Diterima' WHERE id = ?");
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  echo "<script>window.location.href = \"index.php\" </script>";
} else {
  echo "Upload Gagal!";
}
