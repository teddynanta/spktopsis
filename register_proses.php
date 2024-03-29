<?php
session_start();
include "koneksi.php";
// Get form data
$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password before storing
$role = 'user';
// Prepare and bind the SQL statement
$stmt = $koneksi->prepare("INSERT INTO users (nama, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nama, $username, $email, $password, $role);

// Execute the query
if ($stmt->execute()) {
  echo "Registration successful!";
  header("Refresh: 3; URL=login.php"); // Redirect to login.html after 3 seconds
  exit();
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$koneksi->close();
