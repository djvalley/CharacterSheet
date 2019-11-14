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

        <h2><?= $pageTitle ?></h2>

        <?php
          $logout = sanitizeString(INPUT_GET, 'logout');
          if (isset($logout) && $logout == 1) {
            session_destroy();
            echo "Logged out.";
          }


          $createAccount = sanitizeString(INPUT_GET, 'create');
          $submitPressed = sanitizeString(INPUT_POST, 'submit');
          $errorMsg = sanitizeString(INPUT_GET, 'error');
          if (!isset($submitPressed)) {
            // If no submit button pressed then login or create account
            if (!isset($createAccount) || $createAccount != 1) {
              // If not creating account then login to existing account
              echo "<h3 class='error'>$errorMsg</h3>";
              ?>
              <p>Need an account? <a href="login.php?create=1">Create Account</a></p>

              <div class="account">
                <form action="" method="post">
                  <row>
                    <label for="username">
                      <i class="fa fa-user"></i>
                    </label>
                    <input type="text" name="username" placeholder="Username" id="username" required><br>
                  </row>
                  <row>
                    <label for="password">
                      <i class="fa fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" id="password" required><br>
                  </row>
                  <row>
                    <input name="submit" type="submit" value="Login">
                  </row>
                </form>
              </div>

              <?php
              // End of account login form
            } else {

              // Create Account Form
              ?>

              <h2>Create Account</h2>

              <div class="account">
                <form action="login.php" method="post">
                  <row>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                  </row>
                  <row>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                  </row>
                  <row>
                    <label for="accountType">Account Type:</label>
                    <select id="accountType" name="accountType" required>
                      <option value="Player">Player</option>
                      <option value="DM">DM</option>
                    </select>
                  </row>
                  <row>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                  </row>
                  <row>
                    <input type="submit" name="submit" value="Create">
                  </row>
                </form>
              </div>
              <?php

              // End of account creation form
            }
          } else { // Submit login button is pressed

            $message = "";

            if ($submitPressed == "Login") {
              // Login Submit pressed
              // Log into account
              $username = sanitizeString(INPUT_POST, 'username');

              $query = "SELECT userID, password, email, accountType FROM accounts WHERE username = '$username'";

              $resultSet = $pdo->query($query);
              $result = $resultSet->fetch();
              $rowCount = $resultSet->rowCount();

              if ($rowCount == 1) {
                if (password_verify($_POST['password'], $result['password'])) {

                  session_regenerate_id();
                  $_SESSION['authenticated'] = TRUE;
                  $_SESSION['userID'] = $result['userID'];
                  $_SESSION['email'] = $result['email'];
                  $_SESSION['accountType'] = $result['accountType'];

                } else {
                  $message .= "Incorrect Password Please try again. ";
                }
              } else {
                $message .= "Incorrect Username Please try again.";
              }

              if (strlen($message) > 2){
                echo $message;
              } else {
                echo "Login Successful.";
                echo "<meta http-equiv='refresh' content='0;url=index.php'>";
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

              $query = "SELECT userID, password FROM accounts WHERE username = '$username'";
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
