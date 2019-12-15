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
  <div id="bodyBackground">
    <body>
      <div class="wrapper">
        <?php
          include 'templates/nav.php'; // Nav template
          
          // Content Start
        ?>
        <div class="container">
          <div class="welcomeDiv">
            <span><img src="images/dndDwarf2.png" id="leftDwarf" alt="Dwarf wielding a hammer and shield"></span>
            <h1 class="welcomeTrav">Welcome Traveler!</h1>
            <h3 id="introCont">Hello, and welcome to our website! This is a website to help you create and organize your character's sheet for Dungeon's and Dragons!</h3>
            <span><img src="images/dnDDwarf1.png" id="rightDwarf" alt="Dwarf wielding a sword and dagger"></span>
          </div>
          <div class="transBox">
            <div class="contentDiv">
              
              <img src="images/dndHandbook1.jfif" alt="D&D Handbook 5th ed.">
              <p> New to Dungeons and Dragons click on a link to go to the DnD homepage or the DnD wiki! <a href="https://www.dandwiki.com/wiki/">D&DWiki</a>
                <br><a href="https://dnd.wizards.com/">D&D Official Homepage</a>
              </p>
            </div>
          </div>
        </div>
        <div class="booksTable">
          <h2>Not sure what version you're on?</h2>
          <p>Check out the table below to see some other popular books, although the site only
            displays 5th edition information.
          </p>
          <table class="indexTable">
            <tr>
              <th>Image</th>
              <th>Description</th>
              <th>Price</th>
            </tr>
            <tr>
              <td><img src="images/dndHandbook1.jfif" id="tbl5th" alt="5th Edition Book"></td>
              <td class="description">D&D 5th Edition is a fantasy role-playing game.</td>
              <td>$49.95</td>
            </tr>
            <tr>
              <td><img src="images/dnd3.5Ed.jpg" id="tbl3.5" alt=" D&D 3.5 Edition Book"></td>
            <td class="description">D&D 3.5 Edition is a revised revision to the 3rd version, and also adds more monsters to the Monster Manual.</td>
            <td>$30.00</td>
            </tr>
            <tr>
              <td><img src="images/pathfinder.jfif" id="tblPathfinder" alt="Pathfinder Book"></td>
              <td class="description">The Pathfinder Roleplaying Game is a fantasy role-playing game that was published in 2009 by Paizo Publishing.</td>
              <td>$39.30</td>
            </tr>
          </table>
        </div>
        <?php
          // Content End
        ?>
      </div>
      <?php
        include "templates/js.php"; // Javascript script includes
      ?>
    </body>
  </div>
</html>