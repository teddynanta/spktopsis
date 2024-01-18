<?php
session_start();
include "koneksi.php";
// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
// var_dump($result->fetch_assoc());
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  // var_dump($row);
  if (password_verify($password, $row['password'])) {
    $_SESSION['uid'] = $row['id'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['username'] = $username; // Set session
    $_SESSION['role'] = $row['role'];
    // echo "Login successful! Welcome, " . $username;
    if ($_SESSION['role'] == 'admin') {
      header("location: admin/index.php"); // Redirect to login.html after 3 seconds
      exit();
    } elseif ($_SESSION['role'] == 'pimpinan') {
      header("location: admin/index.php"); // Redirect to login.html after 3 seconds
    } else {
      header("location: index2.php"); // Redirect to login.html after 3 seconds
      exit();
    }
    // Redirect to a logged-in page or perform necessary actions
  } else {
    echo '<script>alert("Username atau password yang anda masukkan salah!");</script>';
    header("location: login.php");
    exit();
  }
} else {
  echo '<script>alert("Username atau password yang anda masukkan salah!");</script>';
  header("location: login.php");
  exit();
}

// Close the statement and database koneksiection
$stmt->close();
$koneksi->close();
