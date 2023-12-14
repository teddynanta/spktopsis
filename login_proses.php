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
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  // var_dump($row);
  if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $username; // Set session
    $_SESSION['role'] = $row['role'];
    echo "Login successful! Welcome, " . $username;
    if ($_SESSION['role'] == 'admin') {
      header("Refresh: 3; URL=admin/index.html"); // Redirect to login.html after 3 seconds
      exit();
    } else {
      header("Refresh: 3; URL=index2.php"); // Redirect to login.html after 3 seconds
      exit();
    }
    // Redirect to a logged-in page or perform necessary actions
  } else {
    echo "Invalid password!";
  }
} else {
  echo "Invalid username!";
}

// Close the statement and database koneksiection
$stmt->close();
$koneksi->close();
