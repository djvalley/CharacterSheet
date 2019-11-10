<?php

  include 'resources/tools.php';
  session_start();
  $windowTitle = "D&D Character Info - Character Test"; // Window title for each page, used inside header.php include.
  $pageTitle = "Character Test"; // Page title goes here, used inside the nav.php include.

  $query = "
SELECT 
    *
FROM
    characters c
        LEFT JOIN
    traits t ON c.characterID = t.characterID
        LEFT JOIN
    stats s ON c.characterID = s.characterID
        LEFT JOIN
    skills sk ON c.characterID = sk.characterID
        LEFT JOIN
    lifeState l ON c.characterID = l.characterID
        LEFT JOIN
    equipment e ON c.characterID = e.characterID
    ";
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
            echo '<h2>' . $row['characterName'] . '</h2>';
            echo '<table align="center" border="1" borderColor="black" cellpadding="5" cellspacing="5" width="70%">
              
                <tr>
                    <th>CharacterID</th>
                    <th>Player Name</th>
                    <th>Class</th>
                    <th>Level</th>
                    <th>Race</th>
                    <th>Background</th>
                    <th>Experience</th>
                    <th>Alignment</th>
                    <th>Inspiration</th>
                    <th>Proficiency Bonus</th>
                    <th>Passive Stat</th>
                    <th>Passive Stat Number</th>
                </tr>';

            echo '<tr>
                    <td>' . $row['characterID'] . '</td>
                    <td>' . $row['playerName'] . '</td>
                    <td>' . $row['class'] . '</td>
                    <td>' . $row['level'] . '</td>
                    <td>' . $row['race'] . '</td>
                    <td>' . $row['background'] . '</td>
                    <td>' . $row['expPoints'] . '</td>
                    <td>' . $row['alignment'] . '</td>
                    <td>' . $row['inspiration'] . '</td>
                    <td>' . $row['proficiencyBonus'] . '</td>
                    <td>' . $row['passiveStat'] . '</td>
                    <td>' . $row['passiveStatNum'] . '</td>
                </tr>
                
                
                </table>';


            echo '<h3>Life State</h3>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center" style="width: 100%;">
                        <tr>
                            <th>Armor Class</th>
                            <th>Initiative</th>
                            <th>Speed</th>
                            <th>Max HP</th>
                            <th>Current HP</th>
                            <th>Temporary HP</th>
                            <th>Hit Dice</th>
                            <th>Death Saves</th>

                        </tr>
                        
                         <tr>
                            <td>' . $row['armorClass'] . '</td>
                            <td>' . $row['initiative'] . '</td>
                            <td>' . $row['speed'] . '</td>
                            <td>' . $row['hpMax'] . '</td>
                            <td>' . $row['hpCurrent'] . '</td>
                            <td>' . $row['hpTemp'] . '</td>
                            <td>' . $row['hitDice'] . '</td>
                            <td>' . $row['deathSaves'] . '</td>
                        </tr>
                  </table>';


            echo '<h3>Stats</h3>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center" style="width: 100%;">
                        <tr>
                            <th>Strength</th>
                            <th>Dexterity</th>
                            <th>Constitution</th>
                            <th>Intelligence</th>
                            <th>Wisdom</th>
                            <th>Charisma</th>

                        </tr>
                        
                         <tr>
                            <td>' . $row['strength'] . '</td>
                            <td>' . $row['dexterity'] . '</td>
                            <td>' . $row['constitution'] . '</td>
                            <td>' . $row['intelligence'] . '</td>
                            <td>' . $row['wisdom'] . '</td>
                            <td>' . $row['charisma'] . '</td>
                        </tr>
                  </table>';

            echo '<h3>Skills</h3>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center"  style="width: 100%;">
                        <tr>
                            <th>Acrobatics</th>
                            <th>Animal Handling</th>
                            <th>Arcana</th>
                            <th>Athletics</th>
                            <th>Deception</th>
                            <th>History</th>
                            <th>Insight</th>
                            <th>Intimidation</th>
                            <th>Investigation</th>
                            <th>Medicine</th>
                            <th>Nature</th>
                            <th>Perception</th>
                            <th>Performance</th>
                            <th>Persuasion</th>
                            <th>Religion</th>
                            <th>Sleight of Hand</th>
                            <th>Stealth</th>
                            <th>Survival</th>

                        </tr>
                        
                         <tr>
                            <td>' . $row['acrobatics'] . '</td>
                            <td>' . $row['animalHandling'] . '</td>
                            <td>' . $row['arcana'] . '</td>
                            <td>' . $row['athletics'] . '</td>
                            <td>' . $row['deception'] . '</td>
                            <td>' . $row['history'] . '</td>
                            <td>' . $row['insight'] . '</td>
                            <td>' . $row['intimidation'] . '</td>
                            <td>' . $row['investigation'] . '</td>
                            <td>' . $row['medicine'] . '</td>
                            <td>' . $row['nature'] . '</td>
                            <td>' . $row['perception'] . '</td>
                            <td>' . $row['performance'] . '</td>
                            <td>' . $row['persuasion'] . '</td>
                            <td>' . $row['religion'] . '</td>
                            <td>' . $row['sleightOfHand'] . '</td>
                            <td>' . $row['stealth'] . '</td>
                            <td>' . $row['survival'] . '</td>
                        </tr>

    
                  </table>';

            echo '<h3>Traits</h3>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center">
                        <tr>
                            <th>Personality Traits</th>
                            <th>Ideals</th>
                            <th>Bonds</th>
                            <th>Flaws</th>
                            <th>Proficiencies</th>
                            <th>Languages</th>
                            

                        </tr>
                        
                         <tr>
                            <td>' . $row['personalityTraits'] . '</td>
                            <td>' . $row['ideals'] . '</td>
                            <td>' . $row['bonds'] . '</td>
                            <td>' . $row['flaws'] . '</td>
                            <td>' . $row['proficiencies'] . '</td>
                            <td>' . $row['languages'] . '</td>
                           
                        </tr>

    
                  </table>';


            echo '<h3>Equipment</h3>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center" style="width: 100%;">
                        <tr>
                            <th>CP</th>
                            <th>SP</th>
                            <th>EP</th>
                            <th>GP</th>
                            <th>PP</th>
                            <th>Inventory</th>

                        </tr>
                        
                         <tr>
                            <td>' . $row['CP'] . '</td>
                            <td>' . $row['SP'] . '</td>
                            <td>' . $row['EP'] . '</td>
                            <td>' . $row['GP'] . '</td>
                            <td>' . $row['PP'] . '</td>
                            <td>' . $row['longDesc'] . '</td>
                        </tr>
                  </table>';


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