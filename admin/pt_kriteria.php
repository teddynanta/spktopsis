<?php
session_start();
include "../koneksi.php";
$idss = $koneksi->query("SELECT * FROM tab_kriteria ORDER BY id_kriteria DESC LIMIT 1");
$ids = $idss->fetch_assoc();
$id = $ids['id_kriteria'] + 1;
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$status = $_POST['status'];


$stmt = $koneksi->prepare("INSERT INTO tab_kriteria (id_kriteria, nama_kriteria, bobot, status) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $id, $nama, $bobot, $status);

// Execute the query

if ($stmt->execute()) {
  echo "<script>alert('Input Data Berhasil') </script>";
  header("Refresh: 3; URL=kriteria.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
