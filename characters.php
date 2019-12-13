<?php
  session_start();
  require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
  $windowTitle = "D&D Character Info - Characters"; // Window title for each page, used inside header.php include.
  $pageTitle = "Characters"; // Page title goes here, used inside the nav.php include.

  require 'resources/tools.php';

  $charID = sanitizeString(INPUT_GET, 'charID');

  $query = "SELECT * FROM characters c
              LEFT JOIN traits t USING (characterID)
              LEFT JOIN stats s USING (characterID)
              LEFT JOIN skills sk USING (characterID)
              LEFT JOIN lifeState l USING (characterID)
              LEFT JOIN equipment e USING (characterID)
            WHERE c.characterID = $charID";
  $data = $pdo->query($query);
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
        <form action="characterUpdate.php" method="post">
        <?php

          foreach ($data

          as $row) {
          if ($row['userID'] != $_SESSION['userID']) {
          echo "<h2>Invalid User</h2>";
          echo "<h3>Please make sure you are logged into the correct account before trying to access</h3>";
        } else {
          echo <<<CHARBLOCK

<h2>$row[characterName]<button type="button" id="editCharacter">Edit</button><input type="submit" name="updateChar" value="Save"> </h2>
<div class="mainStats">
<table class="character stats">
  <tr>
    <th colspan="2"><h3>Basic Info</h3></th>
  </tr>
  <tr class="hidden">
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
CHARBLOCK;


          echo <<<LIFEBLOCK
<table class="life stats">
  <tr>
    <th colspan="2"><h3>Life State</h3></th>
  </tr>
  <tr>
    <th>Armor Class</th>
    <td><input disabled id="armorClass" name="armorClass" value="$row[armorClass]"></td>
  </tr>
  <tr>
    <th>Initiative</th>
    <td><input disabled id="initiative" name="initiative" value="$row[initiative]"></td>
  </tr>
  <tr>
    <th>Speed</th>
    <td><input disabled id="speed" name="speed" value="$row[speed]"></td>
  </tr>
  <tr>
    <th>Max HP</th>
    <td><input disabled id="maxHP" name="maxHP" value="$row[hpMax]"></td>
  </tr>
  <tr>
    <th>Current HP</th>
    <td><input disabled id="currentHP" name="currentHP" value="$row[hpCurrent]"></td>
  </tr>
  <tr>
    <th>Temporary HP</th>
    <td><input disabled id="tempHP" name="tempHP" value="$row[hpTemp]"></td>
  </tr>
  <tr>
    <th>Hit Dice</th>
    <td><input disabled id="hitDice" name="hitDice" value="$row[hitDice]"></td>
  </tr>
  <tr>
    <th>Death Saves</th>
    <td><input disabled id="deathSaves" name="deathSaves" value="$row[deathSaves]"></td>
  </tr>

</table>
LIFEBLOCK;

          echo <<<STATBLOCK
<table class="statpoint stats">
  <tr>
    <th colspan="2"><h3>Stats</h3></th>
  </tr>
  <tr>
    <th>Strength</th>
    <td><input disabled id="strength" name="strength" value="$row[strength]"></td>
  </tr>
  <tr>
    <th>Dexterity</th>
    <td><input disabled id="dexterity" name="dexterity" value="$row[dexterity]"></td>
  </tr>
  <tr>
    <th>Constitution</th>
    <td><input disabled id="constitution" name="constitution" value="$row[constitution]"></td>
  </tr>
  <tr>
    <th>Intelligence</th>
    <td><input disabled id="intelligence" name="intelligence" value="$row[intelligence]"></td>
  </tr>
  <tr>
    <th>Wisdom</th>
    <td><input disabled id="wisdom" name="wisdom" value="$row[wisdom]"></td>
  </tr>
  <tr>
    <th>Charisma</th>
    <td><input disabled id="charisma" name="charisma" value="$row[charisma]"></td>
  </tr>

</table>
STATBLOCK;
        ?>
      </div>
    <?php
      echo <<<SKILLSBLOCK
<table class="skills stats">
  <tr>
    <th colspan="4"><h3>Skills</h3></th>
  </tr>
  <tr>
    <th>Acrobatics</th>
    <td><input disabled id="acrobatics" name="acrobatics" value="$row[acrobatics]"></td>
    <th>Medicine</th>
    <td><input disabled id="medicine" name="medicine" value="$row[medicine]"></td>
  </tr>
  <tr>
    <th>Animal Handling</th>
    <td><input disabled id="animalHandling" name="animalHandling" value="$row[animalHandling]"></td>
    <th>Nature</th>
    <td><input disabled id="nature" name="nature" value="$row[nature]"></td>
  </tr>
  <tr>
    <th>Arcana</th>
    <td><input disabled id="arcana" name="arcana" value="$row[arcana]"></td>
    <th>Perception</th>
    <td><input disabled id="perception" name="perception" value="$row[perception]"></td>
  </tr>
  <tr>
    <th>Athletics</th>
    <td><input disabled id="athletics" name="athletics" value="$row[athletics]"></td>
    <th>Performance</th>
    <td><input disabled id="performance" name="performance" value="$row[performance]"></td>
  </tr>
  <tr>
    <th>Deception</th>
    <td><input disabled id="deception" name="deception" value="$row[deception]"></td>
    <th>Persuasion</th>
    <td><input disabled id="persuasion" name="persuasion" value="$row[persuasion]"></td>
  </tr>
  <tr>
    <th>History</th>
    <td><input disabled id="history" name="history" value="$row[history]"></td>
    <th>Religion</th>
    <td><input disabled id="religion" name="religion" value="$row[religion]"></td>
  </tr>
  <tr>
    <th>Insight</th>
    <td><input disabled id="insight" name="insight" value="$row[insight]"></td>
    <th>Sleight of Hand</th>
    <td><input disabled id="sleightOfHand" name="sleightOfHand" value="$row[sleightOfHand]"></td>
  </tr>
  <tr>
    <th>Intimidation</th>
    <td><input disabled id="intimidation" name="intimidation" value="$row[intimidation]"></td>
    <th>Stealth</th>
    <td><input disabled id="stealth" name="stealth" value="$row[stealth]"></td>
  </tr>
  <tr>
    <th>Investigation</th>
    <td><input disabled id="investigation" name="investigation" value="$row[investigation]"></td>
    <th>Survival</th>
    <td><input disabled id="survival" name="survival" value="$row[survival]"></td>
  </tr>
</table>
SKILLSBLOCK;

      echo <<<TRAITSBLOCK
<table class="traits stats">
  <tr>
    <th colspan="2"><h3>Traits</h3></th>
  </tr>
  <tr>
    <th>Personality Traits</th>
    <td><input disabled id="personalityTraits" name="personalityTraits" value="$row[personalityTraits]"></td>
  </tr>
  <tr>
    <th>Ideals</th>
    <td><input disabled id="ideals" name="ideals" value="$row[ideals]"></td>
  </tr>
  <tr>
    <th>Bonds</th>
    <td><input disabled id="bonds" name="bonds" value="$row[bonds]"></td>
  </tr>
  <tr>
    <th>Flaws</th>
    <td><input disabled id="flaws" name="flaws" value="$row[flaws]"></td>
  </tr>
  <tr>
    <th>Proficiencies</th>
    <td><input disabled id="proficiencies" name="proficiencies" value="$row[proficiencies]"></td>
  </tr>
  <tr>
    <th>Languages</th>
    <td><input disabled id="languages" name="languages" value="$row[languages]"></td>
  </tr>
</table>
TRAITSBLOCK;


      echo <<<EQUIPBLOCK
<table class="equipment stats">
  <tr>
    <th colspan="5"><h3>Equipment</h3></th>
  </tr>
    <tr>
      <th>CP</th>
      <th>SP</th>
      <th>EP</th>
      <th>GP</th>
      <th>PP</th>
    </tr>
    <tr>
      <td><input disabled id="cp" name="CP" value="$row[CP]"></td>
      <td><input disabled id="sp" name="SP" value="$row[SP]"></td>
      <td><input disabled id="ep" name="EP" value="$row[EP]"></td>
      <td><input disabled id="gp" name="GP" value="$row[GP]"></td>
      <td><input disabled id="pp" name="pp" value="$row[PP]"></td>
    </tr>
  <tr>
    <th>Inventory</th>
    <td colspan="4"><textarea disabled id="inventory" name="inventory"> $row[longDesc]</textarea></td>
  </tr>
</table>
EQUIPBLOCK;
      }
      }
    ?>
      </form>

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