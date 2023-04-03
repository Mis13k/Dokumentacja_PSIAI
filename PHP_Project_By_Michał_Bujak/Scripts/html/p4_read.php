<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nazwa_uzytkownika = $_POST['nazwa_uzytkownika'];
  $haslo = $_POST['haslo'];

  // Validation of input fields
  if (empty($username)) {
    echo 'Please enter a username.';
  } else if (empty($password)) {
    echo 'Please enter a password.';
  } else {
    // Connect to database
    $conn = mysqli_connect('localhost', 'username', 'password', 'database');

    if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
    }

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username='$nazwa_uzytkownika'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo 'Username already exists. Please choose a different username.';
    } else {
      // Insert user into database
      $sql = "INSERT INTO dane (nazwa_uzytkownika, haslo) VALUES ('$nazwa_uzytkownika', '$haslo')";
      mysqli_query($conn, $sql);

      echo 'Account registered successfully.';
    }

    mysqli_close($conn);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Account Registration</title>
</head>
<body>
  <h2>Account Registration</h2>
  <form method="post">
    <label>Username:</label>
    <input type="text" name="nazwa_uzytkownika">
    <br>
    <label>Password:</label>
    <input type="password" name="haslo">
    <br>
    <input type="submit" value="Register">
  </form>
</body>
</html>