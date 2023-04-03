<html>
  <head>
    <title>Pizza Delivery - Login</title>
    <link rel="stylesheet" href="../css/css_login.css">
  </head>
  <body>
    <div class="login">
      <h1>Login</h1>
    </div>
    <div class="container">
      <form method="post">
        <label for="nazwa_uzytkownika">nazwa_uzytkownika:</label><br>
        <input type="text" id="email" name="nazwa_uzytkownika"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="haslo"><br>
        <input type="submit" value="Submit"><br><br><br>
        <button type="button" id="button">
          <a href="signup.php" target="_blank">Dont have an account yet? Click Here!</a>
        </button>

      </form> 
      <?php
        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Connect to the database
          require_once "../Connections/connection.php";
          
          // Retrieve the user's email and password from the form
          $nazwa_uzytkownika = $_POST["nazwa_uzytkownikal"];
          $haslo = $_POST["haslo"];

          // Get the user from the database
          $sql = "SELECT nazwa_uzytkownika, haslo, admin FROM users WHERE nazwa_uzytkownika = '$nazwa_uzytkownika'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

          // Check if the email matches a user in the database
          if(mysqli_num_rows($result) > 0){
            // Email match a user in the database
            if (haslo == $row["haslo"])
              // Redirect to the appropriate page based on the admin status
              if ($row["admin"] == "yes") {
                header("Location: admin.php");
              } else {
                header("Location: main.php");
              }
              exit();
            } else {
              // Password does not match
              echo "<p class='error'>Invalid email or password</p>";
            }
          } else {
            // Email does not match a user in the database
            echo "<p class='error'>Invalid email or password</p>";
          }

          // Close the connection
          mysqli_close($conn);
        }
      ?>
    </div>
    <div class="article">
    </div>
  </body>
</html>
