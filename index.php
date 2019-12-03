<?php
  session_start();
  $windowTitle = "D&D Character Info - Home"; // Window title for each page, used inside header.php include.
  $pageTitle = "Home"; // Page title goes here, used inside the nav.php include.
  require 'resources/tools.php';
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
        <div id="greeting">

          <img src="images/dnDDwarf1.png" id="leftDwarf" alt="Dwarf wielding a hammer and shield">
          <h1>Welcome Traveler!</h1>
          <img src="images/dndDwarf2.png" id="rightDwarf" alt="Dwarf wielding a sword and dagger">

        </div>

        <p>Hello, and welcome to our website! This is a website to help you create and organize your character's sheet
          for Dungeon's and Dragons!</p>
        <img src="images/dndHandbook1.jfif" alt="D&D Handbook 5th ed.">
        <p>New to Dungeons and Dragons click on a link to go to the DnD homepage or the DnD wiki! <a
              href="https://www.dandwiki.com/wiki/">D&DWiki</a><br><a href="https://dnd.wizards.com/">D&D Official
            Homepage</a>
        </p>


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