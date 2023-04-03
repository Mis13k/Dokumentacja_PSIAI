<?php

$servername = "localhost";
$database = "task_michal";
$username = "root";
$password = "";

  // Connect to the MySQL server
  $conn = mysqli_connect($servername, $username, $password, $database);

  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>