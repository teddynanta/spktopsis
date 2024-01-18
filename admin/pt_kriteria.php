<?php
session_start();
include "../koneksi.php";
$idss = $koneksi->query("SELECT COUNT(*) AS c FROM tab_kriteria");
$ids = $idss->fetch_assoc();
$idplus = $ids['c'] + 1;
$id = 'c' . $idplus;
$nama = $_POST['nama'];
$bobot = $_POST['bobot'];
$status = $_POST['status'];

if ($ids['c'] == 5) {
  echo "<script>alert('Kriteria tidak boleh lebih dari 5 poin!') </script>";
  header("Refresh: 2; URL=kriteria.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  $stmt = $koneksi->prepare("INSERT INTO tab_kriteria (id_kriteria, nama_kriteria, bobot, status) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $id, $nama, $bobot, $status);

  // Execute the query

  if ($stmt->execute()) {
    echo "<script>alert('Input Data Berhasil') </script>";
    header("Refresh: 2; URL=kriteria.php"); // Redirect to login.html after 3 seconds
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }
}
// Close the statement and database connection
$stmt->close();
$koneksi->close();
