<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include "koneksi.php";
// Get form data
// var_dump($_POST);
$iduser = $_POST['iduser'];
$nama = $_POST['nama'];
$data1 = $_POST['pekerjaan'];
$data2 = $_POST['penghasilan'];
$data3 = $_POST['pengeluaran'];
$data4 = $_POST['hutang'];
$data5 = $_POST['tabungan'];
$datenow = new DateTime('now');
$date = $datenow->format('d F Y H:i');
$status = "Menunggu";

$stmt = $koneksi->prepare("INSERT INTO tab_pengajuan (id_user, pekerjaan, penghasilan, pengeluaran, hutang, simpanan, tgl_pengajuan, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $iduser, $data1, $data2, $data3, $data4, $data5, $date, $status);

$stmt2 = $koneksi->prepare("INSERT INTO tab_alternatif (id_alternatif, nama_alternatif) VALUES (?, ?)");
$stmt2->bind_param("ss", $iduser, $nama);

// Execute the query

if ($stmt->execute() && $stmt2->execute()) {
  echo "success!";
  header("Refresh: 3; URL=index2.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
