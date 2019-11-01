<?php
  session_start();
  $windowTitle = "D&D Character Info - Home"; // Window title for each page, used inside header.php include.
  $pageTitle = "Home"; // Page title goes here, used inside the nav.php include.
?>
<!doctype html>
<html lang="en">
  <?php
    include 'templates/header.php' // Header to handle css links and


  ?>
  <body>
    <div class="wrapper">
      <?php
        include 'templates/nav.php'; // Nav template

        // Content Start
      ?>
      <div class="container">


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