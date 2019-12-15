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
        
        <?php
          
          foreach ($data as $row) {
            
            $editBtn = "";
            
            if ($row['userID'] == $_SESSION['userID']) {
              $editBtn = "<button>Edit</button><input type=\"submit\" name=\"updateChar\" value=\"Save\">";
            }
            
            
//            if ($row['userID'] != $_SESSION['userID']) {
//              echo "<h2>Invalid User</h2>";
//              echo "<h3>Please make sure you are logged into the correct account before trying to access</h3>";
//            } else {
            echo <<<CHARBLOCK
<form action="characterUpdate.php" method="post">

<div class = "sheetSection" id = "basicInfoBanner">
<div id="basicLeft">
    <div id="editBtn">$editBtn</div>
    <h1>$row[characterName] </h1>
    <h3>$row[playerName]</h3>
</div>
<div id = "basicRight">
    <div id = "basicSection1">
        <h4>Class</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="class" value="$row[class]" >
        <h4>Level</h4>
        <input disabled type="number" class = "statEdit basicInfo" id="level" value="$row[level]">
    </div>
    <div id = "basicSection2">
        <h4>Race</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="race" value="$row[race]">
        <h4>Experience Points</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="xp" value="$row[expPoints]">
    </div>
    <div id = "basicSection3">
        <h4> Background</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="background" value="$row[background]">
        <h4>Alignment</h4>
        <input disabled type="text" class = "statEdit basicInfo" id="alignment" value="$row[alignment]">
    </div>
</div>
</div>
<div id = "mainContent">
<div id = "sheetLeft">
    <div class = "sheetSection" id = "baseStatsDiv">
        <div class = "basicStat">
            <h4>Strength</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseStr" value="$row[strength]">
        </div>
        <div class = "basicStat">
            <h4>Dexterity</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseDex" value="$row[dexterity]">
        </div>
            <div class = "basicStat">
            <h4>Constitution</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseCon" value="$row[constitution]">
        </div>
        <div class = "basicStat">
            <h4>Intelligence</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseInt" value="$row[intelligence]">
        </div>
        <div class = "basicStat">
            <h4>Wisdom</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseWis" value="$row[wisdom]">
        </div>
        <div class = "basicStat">
            <h4>Charisma</h4>
            <input disabled type="text" class = "statEdit baseStatsText" id="baseChar" value="$row[charisma]">
        </div>
    </div>
    <div class = "sheetSection bonusDiv" id = "inspirationDiv">
            <h4>Inspiration</h4>
            <input disabled type="text" class = "statEdit bonusStatsText" id="inspiration" value="$row[inspiration]">
    </div>
    <div class = "sheetSection bonusDiv" id = "proficiencyDiv">
            <h4>Proficiency Bonus</h4>
            <input disabled type="text" class = "statEdit bonusStatsText" id="proficiency" value="$row[proficiencyBonus]">
    </div>
    <div class = "sheetSection" id = "statsDiv">
        <div id = "adjustedStats">
            <table>
                <tr>
                    <td><h4>Strength</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjStr"></td>
                </tr>
                <tr>
                    <td><h4>Dexterity</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjDex"></td>
                </tr>
                <tr>
                    <td><h4>Constitution</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjCon"></td>
                </tr>
                <tr>
                    <td><h4>Intelligence</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjInt"></td>
                </tr>
                <tr>
                    <td><h4>Wisdom</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjWis"></td>
                </tr>
                <tr>
                    <td><h4>Charisma</h4></td>
                    <td><input disabled type="text" class = "statEdit adjStatsText" id="adjChar"></td>
                </tr>
            </table>
        </div>
        <h3>Saving Throws</h3>
    </div>
    <div class = "sheetSection" id = "PassiveDiv">
        <h4>Passive Wisdom (Perception)</h4>
        <input disabled type="text" class = "statEdit" id="passWis" value="$row[perception]">
    </div>
    <div class = "sheetSection" id = "skillsDiv">
        <h3>Skills</h3>
        <div id = "skillsTable1">
            <table>
                <tr><span class =  "skillStat">  <b>Acrobatics </b>(Dex)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill1" value="$row[acrobatics]"></tr>

                <tr><span class =  "skillStat"> <b>Arcana </b>(Int)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill3" value="$row[arcana]"></tr>

                <tr><span class =  "skillStat"> <b>Deception </b>(Cha)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill5" value="$row[deception]"></tr>

                <tr><span class =  "skillStat"> <b>Insight </b>(Wis)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill7" value="$row[insight]"></tr>

                <tr><span class =  "skillStat"> <b>Investigation </b>(Int)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill9" value="$row[investigation]"></tr>

                <tr><span class =  "skillStat"> <b>Nature </b>(Int)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill11" value="$row[nature]"></tr>

                <tr><span class =  "skillStat"> <b>Persuasion </b>(Cha)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill13" value="$row[persuasion]"></tr>

                <tr><span class =  "skillStat"> <b>Sleight of Hand </b>(Dex)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill15" value="$row[sleightOfHand]"></tr>

                <tr><span class =  "skillStat"> <b>Survival </b>(Wis)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill17" value="$row[survival]"></tr>
            </table>
        </div>
        <div id = "skillsTable2">
            <table>
                <tr><span class =  "skillStat"> <b>Animal Handling </b>(Wis)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill2" value="$row[animalHandling]"></tr>

                <tr><span class =  "skillStat"> <b>Athletics </b>(Str)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill4" value="$row[athletics]"></tr>

                <tr><span class =  "skillStat"> <b>History </b>(Int)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill6" value="$row[history]"></tr>

                <tr><span class =  "skillStat"> <b>Intimidation </b>(Cha)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill8" value="$row[intimidation]"></tr>

                <tr><span class =  "skillStat"> <b>Medicine </b>(Wis)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill10" value="$row[medicine]"></tr>

                <tr><span class =  "skillStat"> <b>Performance </b>(Cha)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill12" value="$row[performance]"></tr>

                <tr><span class =  "skillStat"> <b>Religion </b>(Int)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill14" value="$row[religion]"></tr>

                <tr><span class =  "skillStat"> <b>Stealth </b>(Dex)</span></tr>
                <tr><input disabled type="text" class = "statEdit skillText" id="skill16" value="$row[stealth]"></tr>
            </table>
        </div>

    </div>

    <div class = "sheetSection" id = "LanguageDiv">
        <h3>Proficiencies & Languages</h3>
        <textarea disabled type="text" class = "statEdit passivesText">$row[proficiencies]</textarea>
    </div>
</div>
<div id = "sheetCenter">
    <div>
        <div class = "sheetSection coreStatRowOne">
            <h3>Armor Class</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreArmor" value="$row[armorClass]">
        </div>
        <div class = "sheetSection coreStatRowOne">
            <h3>Initiative</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreInit" value="$row[initiative]">
        </div>
        <div class = "sheetSection coreStatRowOne" id = "speed">
            <h3>Speed</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit" id="coreSpd" value="$row[speed]">
        </div>
        <div class = "sheetSection coreStatRowTwo">
            <div id = "floatLeft">
                <h3> Maximum <br>Hit Point:</h3>
                <input disabled type="text" class = "statEdit coreStats" id="coreHP" value="$row[hpMax]">
            </div>
            <div id = "floatRight">
                <h3>Temporary <br>Hit Point:</h3>
                <input disabled type="text" class = "statEdit coreStats" id="coreAdjHP" value="$row[hpCurrent]">
            </div>
        </div>
        <div class = "sheetSection coreStatRowThree" id = "hitDice">
            <h3>Total Dice:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="totalHit" value="$row[hitDice]">
            <h3>Hit Dice:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="rolledHit">
        </div>
        <div class = "sheetSection coreStatRowThree" id = "deathSaves">
            <h3>Successes:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="deathSuccess" value="$row[deathSaves]">
            <h3>Failures:</h3>
            <input disabled type="text" class = "statEdit coreStatsEdit3" id="deathFail">
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
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName1"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackBns1"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType1"></td>
                    </tr>
                    <tr>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName2"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackBns2"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType2"></td>
                    </tr>
                    <tr>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackName3"></td>
                        <td><input disabled disabled type="text" class = "statEdit attackEdit" id="attackBns3"></td>
                        <td><input disabled type="text" class = "statEdit attackEdit" id="attackType3"></td>
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
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invCP" value="$row[CP]"></td>
                    </tr>
                    <tr>
                        <td><h3>SP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invSP" value="$row[SP]"></td>
                    </tr>
                    <tr>
                        <td><h3>EP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invEP" value="$row[EP]"></td>
                    </tr>
                    <tr>
                        <td><h3>GP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invGP" value="$row[GP]"></td>
                    </tr>
                    <tr>
                        <td><h3>PP</h3></td>
                        <td><input disabled type="text" class = "statEdit InventoryTableText" id="invFP" value="$row[PP]"></td>
                    </tr>
                </table>
        </div>
        <div class = "sheetSection" id = "equipmentOverview">
            <h3>Equipment</h3>
            <textarea disabled type="text" class = "statEdit" id="EquipmentText">$row[longDesc]</textarea>
        </div>
    </div>
</div>
<div id = "sheetRight">
    <div>
        <div class = "sheetSection personalitySub">
            <h3>Personality Traits</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persTraits">$row[personalityTraits]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Ideals</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persIdeals">$row[ideals]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Bonds</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persBonds">$row[bonds]</textarea>
        </div>
        <div class = "sheetSection personalitySub">
            <h3>Flaws</h3>
            <textarea disabled type="text" class = "statEdit personalityText" id="persFlaws">$row[flaws]</textarea>
        </div>
    </div>
    <div class = "sheetSection" id = "featuresDiv">
        <h3>Features & Traits</h3>
        <textarea disabled type="text" class = "statEdit" id="featuresDetailed">Coming Soon</textarea>
    </div>
</div>
</div>

CHARBLOCK;
            
            //}
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