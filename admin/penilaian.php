<?php
session_start();
include "../koneksi.php";
$id = $_GET['id'];
$names = $koneksi->query("SELECT * FROM users WHERE id = $id");
$name = $names->fetch_assoc();
$n = $name['nama'];
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$c3 = $_POST['c3'];
$c4 = $_POST['c4'];
$c5 = $_POST['c5'];
$ic1 = 'c1';
$ic2 = 'c2';
$ic3 = 'c3';
$ic4 = 'c4';
$ic5 = 'c5';

$stmt = $koneksi->prepare("INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $ic1, $c1);

$stmt2 = $koneksi->prepare("INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $id, $ic2, $c2);

$stmt3 = $koneksi->prepare("INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
$stmt3->bind_param("sss", $id, $ic3, $c3);

$stmt4 = $koneksi->prepare("INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
$stmt4->bind_param("sss", $id, $ic4, $c4);

$stmt5 = $koneksi->prepare("INSERT INTO tab_topsis (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
$stmt5->bind_param("sss", $id, $ic5, $c5);

$insert = $koneksi->query("INSERT INTO tab_alternatif (id_alternatif, nama_alternatif) VALUES ($id, '$n')");
// Execute the query

if ($stmt->execute() && $stmt2->execute() && $stmt3->execute() && $stmt4->execute() && $stmt5->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  header("Refresh: 3; URL=index.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "<script>alert('Input Data Gagal') </script>";
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
