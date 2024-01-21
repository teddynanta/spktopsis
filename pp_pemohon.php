<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include "koneksi.php";
// Get form data
// var_dump($_POST);

$sql = $koneksi->query("SELECT * FROM data_pemohon ORDER BY tgl_submit DESC LIMIT 1");
$row = $sql->fetch_assoc();

$idpeng = $row['id_pengajuan'];
$uid = $_POST['iduser'];
$penghasilan = $_POST['penghasilan'];
$sertifikasi = $_POST['sertifikasi'];
$tpp = $_POST['tpp'];
$lainnya = $_POST['lainnya'];
$norek = $_POST['norek'];
$datenow = new DateTime('now');
$date = $datenow->format('d F Y H:i');

$stmt = $koneksi->prepare("INSERT INTO data_penghasilan (id_pengajuan, id_user, penghasilan, sertifikasi, tpp, lainnya, norek, tgl_submit) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $idpeng, $uid, $penghasilan, $sertifikasi, $tpp, $lainnya, $norek, $date);

$update = $koneksi->query("UPDATE tab_pengajuan SET data_penghasilan = 1 WHERE id_pengajuan = '$idpeng'");
// Execute the query

if ($stmt->execute()) {
  echo "<script>alert('Silahkan lanjutkan pengisian berikutnya') </script>";
  header("Refresh: 1; URL=pengajuan4.php?active=yes"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
