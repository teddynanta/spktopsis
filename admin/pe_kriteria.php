<?php
include "../koneksi.php";
// echo "<pre>";
// print_r($_FILES);
// print_r($_GET['id']);
// echo "</pre>";
$id = $_GET['id'];
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$status = $_POST['status'];
// ambil data file
$stmt = $koneksi->prepare("UPDATE tab_kriteria SET nama_kriteria = ?, bobot = ?, status = ? WHERE id_kriteria = '$id'");
$stmt->bind_param("sss", $nama, $bobot, $status);

if ($stmt->execute()) {
  echo "<script>alert('Edit Data Berhasil') </script>";
  echo "<script>window.location.href = \"kriteria.php\" </script>";
} else {
  echo "<script>alert('Edit Data Gagal') </script>";
}
