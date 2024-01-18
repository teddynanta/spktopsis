<?php
//untuk koneksi ke database
session_start();
include("../koneksi.php");

//proses delete
$id = $_GET['id'];
$sql = "DELETE FROM tab_kriteria WHERE id_kriteria = '$id' ";
$hapus = $koneksi->query($sql);

if ($hapus) {
  echo "<script>alert('Hapus Data Berhasil') </script>";
  header("Refresh: 2; URL=kriteria.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Hapus Data Gagal') </script>";
}
