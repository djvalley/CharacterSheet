<?php

include 'resources/tools.php';

$query = "SELECT * FROM characters c LEFT JOIN traits t on c.characterID = t.characterID LEFT JOIN stats s on c.characterID = s.characterID LEFT JOIN skills sk on c.characterID = sk.characterID";
$data = $pdo ->query($query);

session_start();
$windowTitle = "D&D Character Info - Character Test"; // Window title for each page, used inside header.php include.
$pageTitle = "Character Test"; // Page title goes here, used inside the nav.php include.
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
            echo'<h2>'.$row['characterName'].'</h2>';
            echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center">
              
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
                    <td>'.$row['characterID'].'</td>
                    <td>'.$row['playerName'].'</td>
                    <td>'.$row['class'].'</td>
                    <td>'.$row['level'].'</td>
                    <td>'.$row['race'].'</td>
                    <td>'.$row['background'].'</td>
                    <td>'.$row['expPoints'].'</td>
                    <td>'.$row['alignment'].'</td>
                    <td>'.$row['inspiration'].'</td>
                    <td>'.$row['proficiencyBonus'].'</td>
                    <td>'.$row['passiveStat'].'</td>
                    <td>'.$row['passiveStatNum'].'</td>
                </tr>
                
                
                </table>';

            echo'<h2>Stats</h2>';
             echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center">
                        <tr>
                            <th>Strength</th>
                            <th>Dexterity</th>
                            <th>Constitution</th>
                            <th>Intelligence</th>
                            <th>Wisdom</th>
                            <th>Charisma</th>

                        </tr>
                        
                         <tr>
                            <td>'.$row['strength'].'</td>
                            <td>'.$row['dexterity'].'</td>
                            <td>'.$row['constitution'].'</td>
                            <td>'.$row['intelligence'].'</td>
                            <td>'.$row['wisdom'].'</td>
                            <td>'.$row['charisma'].'</td>
                        </tr>
                  </table>';

             echo'<h2>Skills</h2>';
             echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black" align="center">
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
                            <td>'.$row['acrobatics'].'</td>
                            <td>'.$row['animalHandling'].'</td>
                            <td>'.$row['arcana'].'</td>
                            <td>'.$row['athletics'].'</td>
                            <td>'.$row['deception'].'</td>
                            <td>'.$row['history'].'</td>
                            <td>'.$row['insight'].'</td>
                            <td>'.$row['intimidation'].'</td>
                            <td>'.$row['investigation'].'</td>
                            <td>'.$row['medicine'].'</td>
                            <td>'.$row['nature'].'</td>
                            <td>'.$row['perception'].'</td>
                            <td>'.$row['performance'].'</td>
                            <td>'.$row['persuasion'].'</td>
                            <td>'.$row['religion'].'</td>
                            <td>'.$row['sleightOfHand'].'</td>
                            <td>'.$row['stealth'].'</td>
                            <td>'.$row['survival'].'</td>
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