<?php
session_start();
include "../koneksi.php";
$sql = $koneksi->query("SELECT * FROM tab_pengajuan ORDER BY tgl_pengajuan DESC");
$pengajuan = $koneksi->query("SELECT COUNT(*) AS total FROM tab_pengajuan");
$tot_pengajuan = $pengajuan->fetch_assoc();
$p_terima = $koneksi->query("SELECT COUNT(*) AS total FROM tab_pengajuan WHERE status = 'diterima'");
$diterima = $p_terima->fetch_assoc();
$p_tolak = $koneksi->query("SELECT COUNT(*) AS total FROM tab_pengajuan WHERE status = 'ditolak'");
$ditolak = $p_tolak->fetch_assoc();
$p_menunggu = $koneksi->query("SELECT COUNT(*) AS total FROM tab_pengajuan WHERE status = 'menunggu'");
$menunggu = $p_menunggu->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SPK TOPSIS - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>