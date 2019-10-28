<?php
  session_start();
  //require 'authenticate.php'; // Uncomment Page will authenticate whether use is logged in
  $windowTitle = "WINDOW TITLE"; // Window title for each page, used inside header.php include.
  $pageTitle = "INSERT TITLE OF PAGE HERE"; // Page title goes here, used inside the nav.php include.

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