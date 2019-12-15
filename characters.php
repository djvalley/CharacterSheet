<?php
  session_start();
  require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
  $windowTitle = "D&D Character Info - Characters"; // Window title for each page, used inside header.php include.
  $pageTitle = "Characters"; // Page title goes here, used inside the nav.php include.
  
  require 'resources/tools.php';
  
  $createCharacter = sanitizeString(INPUT_GET, 'create');
  $charID = sanitizeString(INPUT_GET, 'charID');
  

  $playerName = "";
  $characterName = "";
  
  if (isset($createCharacter) && $createCharacter == 1) {
    $charQuery = "SELECT characterID FROM characters
                ORDER BY characterID DESC
                limit 1";
    $charRows = $pdo->query($charQuery)->fetch();
    $charID = $charRows['characterID'] + 1;
    $row = array('characterID' => $charID);
    $characterName = "<input disabled type=\"text\" id=\"characterName\" name=\"characterName\" placeholder='Character Name'>";
    $playerName = "<input disabled type=\"text\" id=\"playerName\" name=\"playerName\" placeholder='Player Name'>";
    
  } else {
    $query = "SELECT * FROM characters c
              LEFT JOIN traits t USING (characterID)
              LEFT JOIN stats s USING (characterID)
              LEFT JOIN skills sk USING (characterID)
              LEFT JOIN lifeState l USING (characterID)
              LEFT JOIN equipment e USING (characterID)
            WHERE c.characterID = $charID";
    $row = $pdo->query($query)->fetch();
  }
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
        
        <?php
          
          $editBtn = "";
          
          if ($row['userID'] == $_SESSION['userID'] || isset($createCharacter)) {
            $editBtn = "<button type='button'>Edit</button><input type=\"submit\" name=\"updateChar\" value=\"Save\">";
          }
          
          if (!isset($createCharacter)) {
            $playerName = $row['playerName'];
            $characterName = $row['characterName'];
          }

          
          //            if ($row['userID'] != $_SESSION['userID']) {
          //              echo "<h2>Invalid User</h2>";
          //              echo "<h3>Please make sure you are logged into the correct account before trying to access</h3>";
          //            } else {
          echo <<<CHARBLOCK
<form action="characterUpdate.php" method="post">
<input disabled class="hidden" type="text" id="characterID" name="characterID" value="$row[characterID]">
<div class = "sheetSection" id = "basicInfoBanner">
<div id="basicLeft">
    <div id="editBtn">$editBtn</div>
    <h1>$characterName</h1>
    <h3>$playerName</h3>
</div>
<div id = "basicRight">
    <div id = "basicSection1">
        <h4>Class</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="class" name="class" value="$row[class]" >
        <h4>Level</h4>
        <input disabled type="number" class = "statEdit basicInfo" id="level" name="level" value="$row[level]">
    </div>
    <div id = "basicSection2">
        <h4>Race</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="race" name="race" value="$row[race]">
        <h4>Experience Points</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="xp" name="xp" value="$row[expPoints]">
    </div>
    <div id = "basicSection3">
        <h4> Background</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="background" name="background" value="$row[background]">
        <h4>Alignment</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="alignment" name="alignment" value="$row[alignment]">
    </div>
</div>
</div>
<div id = "mainContent">
<div id = "sheetLeft">
    <div class = "sheetSection" id = "baseStatsDiv">
        <div class = "basicStat">
            <h4>Strength</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseStr" name="baseStr" value="$row[strength]">
        </div>
        <div class = "basicStat">
            <h4>Dexterity</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseDex" name="baseDex" value="$row[dexterity]">
        </div>
            <div class = "basicStat">
            <h4>Constitution</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseCon" name="baseCon" value="$row[constitution]">
        </div>
        <div class = "basicStat">
            <h4>Intelligence</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseInt" name="baseInt" value="$row[intelligence]">
        </div>
        <div class = "basicStat">
            <h4>Wisdom</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseWis" name="baseWis" value="$row[wisdom]">
        </div>
        <div class = "basicStat">
            <h4>Charisma</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseChar" name="baseChar" value="$row[charisma]">
        </div>
    </div>
    <div class = "sheetSection bonusDiv" id = "inspirationDiv">
            <h4>Inspiration</h4>
            <input disabled type="text" class = "statEdit bonusStatsText" id="inspiration" name="inspiration" value="$row[inspiration]">
    </div>
    <div class = "sheetSection bonusDiv" id = "proficiencyDiv">
            <h4>Proficiency Bonus</h4>
            <input disabled type="text" class = "statEdit bonusStatsText" id="proficiency" name="proficiency" value="$row[proficiencyBonus]">
    </div>
    <div class = "sheetSection" id = "statsDiv">
        <div id = "adjustedStats">
            <table>
                <tr>
                    <td><h4>Strength</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjStr" name="adjStr" value="$row[adjStr]"></td>
                </tr>
                <tr>
                    <td><h4>Dexterity</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjDex" name="adjDex" value="$row[adjDex]"></td>
                </tr>
                <tr>
                    <td><h4>Constitution</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjCon" name="adjCon" value="$row[adjCon]"></td>
                </tr>
                <tr>
                    <td><h4>Intelligence</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjInt" name="adjInt" value="$row[adjInt]"></td>
                </tr>
                <tr>
                    <td><h4>Wisdom</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjWis" name="adjWis" value="$row[adjWis]"></td>
                </tr>
                <tr>
                    <td><h4>Charisma</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjChar" name="adjChar" value="$row[adjChar]"></td>
                </tr>
            </table>
        </div>
        <h3>Saving Throws</h3>
    </div>
    <div class = "sheetSection" id = "PassiveDiv">
        <h4>Passive Wisdom (Perception)</h4>
        <input disabled type="text" class = "statEdit" id="passWis" name="perception" value="$row[perception]">
    </div>
    <div class = "sheetSection" id = "skillsDiv">
        <h3>Skills</h3>
        <div id = "skillsTable1">
            <table>
                <tr><td><span class =  "skillStat">  <b>Acrobatics </b>(Dex)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill1" name="skill1" value="$row[acrobatics]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Arcana </b>(Int)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill3" name="skill3" value="$row[arcana]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Deception </b>(Cha)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill5" name="skill5" value="$row[deception]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Insight </b>(Wis)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill7" name="skill7" value="$row[insight]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Investigation </b>(Int)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill9" name="skill9" value="$row[investigation]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Nature </b>(Int)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill11" name="skill11" value="$row[nature]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Persuasion </b>(Cha)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill13" name="skill13" value="$row[persuasion]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Sleight of Hand </b>(Dex)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill15" name="skill15" value="$row[sleightOfHand]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Survival </b>(Wis)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill17" name="skill17" value="$row[survival]"></td></tr>
            </table>
        </div>
        <div id = "skillsTable2">
            <table>
                <tr><td><span class =  "skillStat"> <b>Animal Handling </b>(Wis)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill2" name="skill2" value="$row[animalHandling]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Athletics </b>(Str)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill4" name="skill4" value="$row[athletics]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>History </b>(Int)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill6" name="skill6" value="$row[history]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Intimidation </b>(Cha)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill8" name="skill8" value="$row[intimidation]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Medicine </b>(Wis)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill10" name="skill10" value="$row[medicine]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Performance </b>(Cha)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill12" name="skill12" value="$row[performance]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Religion </b>(Int)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill14" name="skill14" value="$row[religion]"></td></tr>

                <tr><td><span class =  "skillStat"> <b>Stealth </b>(Dex)</span></td></tr>
                <tr><td><input disabled type="text" class = "statEdit skillText" id="skill16" name="skill16" value="$row[stealth]"></td></tr>
            </table>
        </div>

    </div>

    <div class = "sheetSection" id = "LanguageDiv">
        <h3>Proficiencies & Languages</h3>
        <textarea disabled type="text" class = "statEdit passivesText" id="proficiencies" name="proficiencies">$row[proficiencies]</textarea>
    </div>
</div>
<div id = "sheetCenter">
    <div>
        <div class = "sheetSection coreStatRowOne">
            <h3>Armor Class</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreArmor" name="coreArmor" value="$row[armorClass]">
        </div>
        <div class = "sheetSection coreStatRowOne">
            <h3>Initiative</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreInit" name="coreInit" value="$row[initiative]">
        </div>
        <div class = "sheetSection coreStatRowOne" id = "speed">
            <h3>Speed</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreSpd" name="coreSpd" value="$row[speed]">
        </div>
        <div class = "sheetSection coreStatRowTwo">
            <div id = "floatLeft">
                <h3> Maximum <br>Hit Point:</h3>
                <input disabled type="text" class = "statEdit coreStats" id="coreHP" name="coreHP" value="$row[hpMax]">
            </div>
            <div id = "floatCenter">
                <h3> Current <br>Hit Point:</h3>
                <input disabled type="text" class = "statEdit coreStats" id="coreCurrentHP" name="coreCurrentHP" value="$row[hpCurrent]">
            </div>
            <div id = "floatRight">
                <h3>Temporary <br>Hit Point:</h3>
                <input disabled type="text" class = "statEdit coreStats" id="coreAdjHP" name="coreAdjHP" value="$row[hpCurrent]">
            </div>
        </div>
        <div class = "sheetSection coreStatRowThree" id = "hitDice">
            <h3>Total Dice:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="totalHit" name="totalHit" value="$row[totalDice]">
            <h3>Hit Dice:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="rolledHit" name="rolledHit" value="$row[hitDice]">
        </div>
        <div class = "sheetSection coreStatRowThree" id = "deathSaves">
            <h3>Successes:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="deathSuccess" name="deathSuccess" value="$row[deathSaves]">
            <h3>Failures:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="deathFail" name="deathFail" value="$row[deathFail]">
            <h3>Death Saves</h3>
            <!-- <input type="text" class = "statEdit coreStatsEdit3" id="savesText"> -->
        </div>
    </div>
    <div id = "attacksDiv">
        <div class = "sheetSection" id = "attacksTable">
            <table>
                    <tr>
                        <td><h3>Name</h3></td>
                        <td><h3>Atk Bonus</h3></td>
                        <td><h3>Damage/Type</h3></td>
                    </tr>
                    <tr>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName1" name="attackName1"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackBns1" name="attackBns1"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType1" name="attackType1"></td>
                    </tr>
                    <tr>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName2" name="attackName2"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackBns2" name="attackBns2"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType2" name="attackType2"></td>
                    </tr>
                    <tr>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName3" name="attackName3"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackBns3" name="attackBns3"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType3" name="attackType3"></td>
                    </tr>
                </table>
        </div>
        <div class = "sheetSection" id = "attackNotes">
            <h3>Attacks & Spellcasting</h3>
            <textarea disabled type="text" class = "statEdit" id="attacksDetailed">Coming Soon</textarea>
        </div>
    </div>
    <div id = "equipmentDiv">
        <div class = "sheetSection" id = "equipmentTable">
            <table>
                    <tr>
                        <td><h3>CP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invCP" name="invCP" value="$row[CP]"></td>
                    </tr>
                    <tr>
                        <td><h3>SP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invSP" name="invSP" value="$row[SP]"></td>
                    </tr>
                    <tr>
                        <td><h3>EP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invEP" name="invEP" value="$row[EP]"></td>
                    </tr>
                    <tr>
                        <td><h3>GP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invGP" name="invGP" value="$row[GP]"></td>
                    </tr>
                    <tr>
                        <td><h3>PP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invPP" name="invPP" value="$row[PP]"></td>
                    </tr>
                </table>
        </div>
        <div class = "sheetSection" id = "equipmentOverview">
            <h3>Equipment</h3>
            <textarea disabled type="text" class = "statEdit" id="EquipmentText" name="EquipmentText">$row[longDesc]</textarea>
        </div>
    </div>
</div>
<div id = "sheetRight">
    <div>
        <div class = "sheetSection personalitySub">
            <h3>Personality Traits</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persTraits" name="persTraits">$row[personalityTraits]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Ideals</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persIdeals" name="persIdeals">$row[ideals]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Bonds</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persBonds" name="persBonds">$row[bonds]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Flaws</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persFlaws" name="persFlaws">$row[flaws]</textarea>
        </div>
    </div>
    <div class = "sheetSection" id = "featuresDiv">
        <h3>Features & Traits</h3>
        <textarea disabled type="text" class = "statEdit" id="featuresDetailed">Coming Soon</textarea>
    </div>
</div>
</div>

CHARBLOCK;
        
        ?>
        </form>
      
      </div>
      <?php
        // Content End
        if (isset($createCharacter) && $createCharacter == 1) {
          echo '<script type="text/javascript">',
          'clearFields()',
          '</script>';
        }
      
      ?>
    </div>
    <?php
      include "templates/js.php"; // Javascript script includes
    ?>
  </body>
</html>