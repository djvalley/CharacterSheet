<?php
  session_start();
  $windowTitle = "D&D Character Info - Login"; // Window title for each page, used inside header.php include.
  $pageTitle = "Login"; // Page title goes here, used inside the nav.php include.
?>
<!doctype html>
<html lang="en">
  <?php
    require 'templates/header.php';
    require 'resources/tools.php';
  ?>
  <body>
    <div class="wrapper">
      <?php
        include 'templates/nav.php'; // Nav template

        // Content Start
      ?>
      <div class="container">

        <?php
          $logout = sanitizeString(INPUT_GET, 'logout');
          if (isset($logout) && $logout == 1) {
            session_destroy();
            echo "Logged out.";
          }


          $createAccount = sanitizeString(INPUT_GET, 'create');
          $submitPressed = sanitizeString(INPUT_POST, 'submit');

          if (!isset($submitPressed)) {
            // If no submit button pressed then login or create account
            if (!isset($createAccount) || $createAccount != 1) {
              // If not creating account then login to existing account
              ?>
              <p>Need an account? <a href="login.php?create=1">Create Account</a></p>

              <div class="account">
                <form action="" method="post">
                  <label for="username">
                    <i class="fa fa-user"></i>
                  </label>
                  <input type="text" name="username" placeholder="Username" id="username" required><br>
                  <label for="password">
                    <i class="fa fa-lock"></i>
                  </label>
                  <input type="password" name="password" placeholder="Password" id="password" required><br>
                  <input name="submit" type="submit" value="Login">
                </form>
              </div>

              <?php
              // End of account login form
            } else {

              // Create Account Form
              ?>

              <h3>Create Account</h3>

              <div class="account">
                <form action="login.php" method="post">
                  <label for="username">Username:</label>
                  <input type="text" name="username" id="username" required><br>
                  <label for="email">Email:</label>
                  <input type="email" name="email" id="email" required><br>
                  <label for="accountType">Account Type:</label>
                  <select id="accountType" name="accountType" required>
                    <option value="Player">Player</option>
                    <option value="DM">DM</option>
                  </select><br>
                  <label for="password">Password:</label>
                  <input type="password" name="password" id="password" required><br>
                  <input type="submit" name="submit" value="Create">
                </form>
              </div>
              <?php

              // End of account creation form
            }
          } else { // Submit button is pressed

            $message = "";

            if ($submitPressed == "Login") {
              // Login Submit pressed
              // Log into account
              $username = sanitizeString(INPUT_POST, 'username');

              $query = "SELECT id, password, email, accountType FROM accounts WHERE username = '$username'";

              $resultSet = $pdo->query($query);
              $result = $resultSet->fetch();
              $rowCount = $resultSet->rowCount();

              if ($rowCount == 1) {
                if (password_verify($_POST['password'], $result['password'])) {

                  session_regenerate_id();
                  $_SESSION['authenticated'] = TRUE;
                  $_SESSION['id'] = $result['id'];
                  $_SESSION['email'] = $result['email'];
                  $_SESSION['accountType'] = $result['accountType'];

                } else {
                  $message .= "Incorrect Password Please try again";
                }
              } else {
                $message .= "Incorrect Username Please try again.";
              }

              if (strlen($message > 1)) {
                echo $message;
              } else {
                echo "Logged in successfully.";

              }

            } else {
              // Create Submit pressed
              // Create new account
              if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['accountType'])) {
                // Could not get the data that should have been sent.
                die ('Please complete the registration form!');
              }
// Make sure the submitted registration values are not empty.
              if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['accountType'])) {
                // One or more values are empty.
                die ('Please complete the registration form');
              }

              $username = sanitizeString(INPUT_POST, 'username');
              $email = sanitizeEmail(INPUT_POST, 'email');
              $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
              $accountType = sanitizeString(INPUT_POST, 'accountType');

              $query = "SELECT id, password FROM accounts WHERE username = '$username'";
              $result = $pdo->query($query)->rowCount();

              if ($result > 0) {
                echo "Username already exists, please try again";
              } else {
                // Create the account

                $query = "INSERT INTO accounts (username, password, email, accountType) VALUES (?,?,?,?)";
                $statement = $pdo->prepare($query);

                $statement->execute(array($username, $password, $email, $accountType));

                echo "Registration complete";
              }

            }

          }

        ?>
      </div>


      <?php
        // Content End
      ?>
    </div>
    <?php
      include "templates/js.php"; // Javascript script includes
    ?>
  </body>
</html>
