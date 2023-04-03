<html>
  <head>
    <title>Księgarnia - zamówienia</title>
    <link rel="stylesheet" href="../css/css_signup.css">
  </head>
  <body>
  <div class="wrapper">
    <div class="please">
      <h1>Złóż zamówienie</h1>
      </button>
      <br>
      <br>
      <br>
    </div>
    <div class="container">
      <form method="post" action="signup.php">
        <label for="tytuł">Tytuł książki:</label><br>
        <input type="text" id="tytuł" name="tytuł" required><br>
        <label for="ilość">Ilość:</label><br>
        <input type="number" id="ilość" name="ilość" required><br>
      </form>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Get the user's information from the form
          $login = $_POST["login"];
          $password = $_POST["password"];
          $email = $_POST["email"];

          // Connect to the database
          require_once "../connection/c1.php";

          // Insert the new user's information into the database
          $sql = "INSERT INTO t1 (login, password, email)
        VALUES ('$login', '$password', '$email)";
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