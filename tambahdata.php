<?php
session_start();
include "koneksi.php";
// Get form data
$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];
$data4 = $_POST['data4'];
$data5 = $_POST['data5'];
$data6 = $_POST['data6'];

$stmt = $koneksi->prepare("INSERT INTO data (data1, data2, data3, data4, data5, data6) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $data6);

// Execute the query
if ($stmt->execute()) {
  echo "success!";
  header("Refresh: 3; URL=index2.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
