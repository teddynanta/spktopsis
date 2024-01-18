<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include "koneksi.php";
// Get form data
// var_dump($_POST);
$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];
$p8 = $_POST['p8'];
$datenow = new DateTime('now');
$date = $datenow->format('d F Y H:i');
$status = "Menunggu";

$stmt = $koneksi->prepare("INSERT INTO tab_pengajuan (id_user, p1, p2, p3, p4, p5, p6, p7, p8, tgl_pengajuan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $iduser, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $date, $status);

$stmt2 = $koneksi->prepare("INSERT INTO tab_alternatif (id_alternatif, nama_alternatif) VALUES (?, ?)");
$stmt2->bind_param("ss", $iduser, $nama);

// Execute the query

if ($stmt->execute() && $stmt2->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  header("Refresh: 3; URL=index2.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
