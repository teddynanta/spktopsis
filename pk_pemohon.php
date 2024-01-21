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
$permohonan = $_POST['permohonan'];
$jangka = $_POST['jangka'];
$tujuan = $_POST['tujuan'];
$datenow = new DateTime('now');
$date = $datenow->format('d F Y H:i');

$stmt = $koneksi->prepare("INSERT INTO data_permohonan (id_pengajuan, id_user, permohonan, jangka, tujuan, tgl_submit) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $idpeng, $uid, $permohonan, $jangka, $tujuan, $date);


// Execute the query

if ($stmt->execute()) {
  echo "<script>alert('Lanjutkan dengan melengkapi dokumen pendukung.') </script>";
  header("Refresh: 1; URL=upload_dokumen.php?active=yes"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
