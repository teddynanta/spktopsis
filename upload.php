<?php
include "koneksi.php";
// echo "<pre>";
// print_r($_FILES);
// print_r($_GET['id']);
// echo "</pre>";
$idpeng = $_GET['id'];
$uid = $_POST['iduser'];
// ambil data file
$namaFile = $_FILES['dokumen1']['name'];
$namaSementara = $_FILES['dokumen1']['tmp_name'];
$namaFile2 = $_FILES['dokumen2']['name'];
$namaSementara2 = $_FILES['dokumen2']['tmp_name'];
$namaFile3 = $_FILES['dokumen3']['name'];
$namaSementara3 = $_FILES['dokumen3']['tmp_name'];
$namaFile4 = $_FILES['dokumen4']['name'];
$namaSementara4 = $_FILES['dokumen4']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "uploads/";
$lokasi = $dirUpload . $namaFile;
$lokasi2 = $dirUpload . $namaFile2;
$lokasi3 = $dirUpload . $namaFile3;
$lokasi4 = $dirUpload . $namaFile4;

// // pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);
$terupload2 = move_uploaded_file($namaSementara2, $dirUpload . $namaFile2);
$terupload3 = move_uploaded_file($namaSementara3, $dirUpload . $namaFile3);
$terupload4 = move_uploaded_file($namaSementara4, $dirUpload . $namaFile4);
$stmt = $koneksi->prepare("UPDATE users SET dokumen1 = ?, dokumen2 = ?, dokumen3 = ?, dokumen4 =? WHERE id = ?");
$stmt->bind_param("ssssi", $lokasi, $lokasi2, $lokasi3, $lokasi4, $uid);
$update = $koneksi->query("UPDATE tab_pengajuan SET data_pendukung = 1 WHERE id_pengajuan = '$idpeng'");
if ($terupload && $stmt->execute()) {
  echo "<script>alert('Input Data Berhasil, Silahkan download formulir anda') </script>";
  header("Refresh: 1; URL=home.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "Upload Gagal!";
}
