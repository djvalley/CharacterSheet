<?php
  session_start();
  //require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
  $windowTitle = "D&D Character Info - Characters"; // Window title for each page, used inside header.php include.
  $pageTitle = "Characters"; // Page title goes here, used inside the nav.php include.

  require 'resources/tools.php';

  //$charID = sanitizeString(INPUT_GET, 'charID');
  $charID = 3;


  $characterQuery = "SELECT * FROM characters WHERE characterID = $charID";
  $traitsQuery = "SELECT * FROM traits WHERE characterID = $charID";
  $statsQuery = "SELECT * FROM stats WHERE characterID = $charID";
  $skillsQuery = "SELECT * FROM skills WHERE characterID = $charID";
  $lifeStateQuery = "SELECT * FROM lifeState WHERE characterID = $charID";
  $equipmentQuery = "SELECT * FROM equipment WHERE characterID = $charID";
  $attacksQuery = "SELECT * FROM attacksSpellcasting WHERE characterID = $charID";
  $featuresQuery = "SELECT * FROM features WHERE characterID = $charID";

  $character = $pdo->query($characterQuery)->fetch();
  $traits = $pdo->query($traitsQuery)->fetch();
  $stats = $pdo->query($statsQuery)->fetch();
  $skills = $pdo->query($skillsQuery)->fetch();
  $lifeState = $pdo->query($lifeStateQuery)->fetch();
  $equipment = $pdo->query($equipmentQuery);
  $attacks = $pdo->query($attacksQuery);
  $features = $pdo->query($featuresQuery);


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
        <div class="characterDiv">
          <div class="charMain">
            <?php

            ?>
          </div>
        <?php


        ?>

        </div>
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