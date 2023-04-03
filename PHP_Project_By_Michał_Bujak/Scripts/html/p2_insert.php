<html>
  <head>
    <title>Księgarnia - rejestracja</title>
    <link rel="stylesheet" href="../css/css_signup.css">
  </head>
  <body>
  <div class="wrapper">
    <div class="please">
      <h1>Zrejestruj się</h1>
      <button type="button" id="button">
          <a href="p1.php" target="_blank">Już posiadasz konto? Zaloguj się tutaj!</a>
      </button>
      <br>
      <br>
      <br>
    </div>
    <div class="container">
      <form method="post" action>
        <label for="login">Login:</label><br>
        <input type="text" id="nazwa_uzytkownia" name="nazwa_uzytkownia" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="haslo" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit">
      </form>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Get the user's information from the form
          $nazwa_uzytkownika = $_POST["nazwa_uzytkownia"];
          $haslo = $_POST["haslo"];
          $email = $_POST["email"];

          // Connect to the database
          require_once "../../Connections/connection.php";

          // Insert the new user's information into the database
          $sql = "INSERT INTO dane (nazwa_uzytkownika, haslo, email)
        VALUES ('$nazwa_uzytkownika', '$haslo', '$email')";
          if (mysqli_query($conn, $sql)) {
            echo "<p>Account created successfully</p>";
          } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
          }

          // Close the connection
          mysqli_close($conn);
        }
      ?>
    </div>
  </div>
  </body>
</html>