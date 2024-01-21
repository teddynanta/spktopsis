<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
include "koneksi.php";
// Get form data
// var_dump($_POST);
$sql = $koneksi->query("SELECT COUNT(*) AS c FROM data_pemohon");
$count = $sql->fetch_assoc();
var_dump($count['c']);
if ($count['c'] == 0) {
  $id = str_pad(1, 5, "0", STR_PAD_LEFT);
} else {
  $id = str_pad($count['c'] + 1, 5, "0", STR_PAD_LEFT);
}
$year = date('Y');
$uid = $_POST['iduser'];
$idpeng = 'PENG/' . $id . '/' . $uid .  '/' . $year;
$nama = $_POST['nama'];
$bdate = $_POST['bdate'];
$warga = $_POST['warga'];
$nik = $_POST['nik'];
$npwp = $_POST['npwp'];
$ibu = $_POST['ibu'];
$nikah = $_POST['nikah'];
$pnama = $_POST['pnama'];
$pbdate = $_POST['pbdate'];
$alamat = $_POST['alamat'];
$alamatdom = $_POST['alamatdom'];
$notel = $_POST['notel'];

$stmt = $koneksi->prepare("INSERT INTO data_pemohon (id_pengajuan, id_user, nama, bdate, warga, nik, npwp, ibu, nikah, pnama, pbdate, alamat, alamatdom, notel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssss", $idpeng, $uid, $nama, $bdate, $warga, $nik, $npwp, $ibu, $nikah, $pnama, $pbdate, $alamat, $alamatdom, $notel);


// Execute the query

if ($stmt->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  header("Refresh: 1; URL=home.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
