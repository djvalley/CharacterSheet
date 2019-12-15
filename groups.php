<?php
  session_start();
  require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
  $windowTitle = "D&D Character Info - Groups"; // Window title for each page, used inside header.php include.
  $pageTitle = "Groups"; // Page title goes here, used inside the nav.php include.
  require 'resources/tools.php';
  
  $groupID = sanitizeString(INPUT_GET, 'groupID');
  $query = "SELECT * FROM accounts LEFT JOIN characters USING (userID) LEFT JOIN groups USING (groupID) WHERE groupID = $groupID ";
  $data = $pdo->query($query);
  
  //Query and PDO that displays a specific <h2>
  $headerQuery = "SELECT groupName FROM groups WHERE groupID = $groupID";
  $headerData = $pdo->query($headerQuery);
?>
<!doctype html>
<html lang="en">
  <?php
    include 'templates/header.php' // Header to handle css links and
  
  
  ?>
  <body>
    <div class="container">
      <?php
        include 'templates/nav.php'; // Nav template
        
        // Content Start
      ?>
      
      
      <?php
        
        foreach ($headerData AS $row) {
          echo "<h2>$row[groupName]</h2>";
        }
        
        foreach ($data AS $row) {
          
          echo <<<CHARBLOCK
    <div class="wrapperGroups">
    <form action="characterUpdate.php" method="post">
    <div class="mainStats">
        <table class="character stats">
          <tr>
            <th colspan="2"><a id="groupNameLinks" href='/characters.php?charID=$row[characterID]'><h3>$row[characterName]</h3></a></th>
          </tr>
          <tr>
            <th>Account Type</th>
            <td>$row[accountType]</td>
          </tr>
          <tr>
            <th>CharacterID</th>
            <td><input disabled type="number" id="characterID" name="characterID" value="$row[characterID]"></td>
          </tr>
          <tr>
            <th>Player Name</th>
            <td><input disabled type="text" id="playerName" name="playerName" value="$row[playerName]"></td>
          </tr>
          <tr>
            <th>Class</th>
            <td><input disabled type="text" id="class" name="class" value="$row[class]"></td>
          </tr>
          <tr>
            <th>Level</th>
            <td><input disabled type="number" step="1" id="level" name="level" value="$row[level]"></td>
          </tr>
          <tr>
            <th>Race</th>
            <td><input disabled type="text" id="race" name="race" value="$row[race]"></td>
          </tr>
          <tr>
            <th>Background</th>
            <td><input disabled type="text" id="background" name="background" value="$row[background]"></td>
          </tr>
          <tr>
            <th>Experience</th>
            <td><input disabled type="number" step="1" id="experience" name="experience" value="$row[expPoints]"></td>
          </tr>
          <tr>
            <th>Alignment</th>
            <td><input disabled id="alignment" name="alignment" value="$row[alignment]"></td>
          </tr>
          <tr>
            <th>Inspiration</th>
            <td><input disabled id="inspiration" name="inspiration" value="$row[inspiration]"></td>
          </tr>
          <tr>
            <th>Proficiency Bonus</th>
            <td><input disabled id="proficiencyBonus" name="proficiencyBonus" value="$row[proficiencyBonus]"></td>
          </tr>
          <tr>
            <th>Passive Stat</th>
            <td><input disabled id="passiveStat" name="passiveStat" value="$row[passiveStat]"></td>
          </tr>
          <tr>
            <th>Passive Stat Number</th>
            <td><input disabled id="passiveStatNumber" name="passiveStatNumber" value="$row[passiveStatNum]"></td>
          </tr>
        </table>
    </div>
</form>
</div>

CHARBLOCK;
        
        }
        
        
        // Content End
      ?>
    </div>
    <?php
      include "templates/js.php"; // Javascript script includes
    ?>
  </body>
</html>