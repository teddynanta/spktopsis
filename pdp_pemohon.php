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
$pekerjaan = $_POST['pekerjaan'];
$nip = $_POST['nip'];
$perusahaan = $_POST['perusahaan'];
$lamakerja = $_POST['lamakerja'];
$jabatan = $_POST['jabatan'];
$alamatkantor = $_POST['alamatkantor'];
$notelkantor = $_POST['notelkantor'];
$atasan = $_POST['atasan'];
$jab_atasan = $_POST['jab_atasan'];
$datenow = new DateTime('now');
$date = $datenow->format('d F Y H:i');

$stmt = $koneksi->prepare("INSERT INTO data_pekerjaan (id_pengajuan, id_user, pekerjaan, nip, perusahaan, lamakerja, jabatan, alamatkantor, notelkantor, atasan, jab_atasan, tgl_submit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $idpeng, $uid, $pekerjaan, $nip, $perusahaan, $lamakerja, $jabatan, $alamatkantor, $notelkantor, $atasan, $jab_atasan, $date);


// Execute the query

if ($stmt->execute()) {
  echo "<script>alert('Silahkan lanjutkan pengisian berikutnya') </script>";
  header("Refresh: 1; URL=pengajuan3.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
