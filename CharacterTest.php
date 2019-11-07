<?php

include 'resources/tools.php';

$query = "SELECT * FROM characters";
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

        echo'<h2>Character Overview</h2>';
        echo '<table width="70%" border="1" cellpadding="5" cellspacing="5" borderColor="black">
              
                <tr>
                    <th>CharacterID</th>
                    <th>Player Name</th>
                    <th>Character Name</th>
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


        foreach($data as $row) {
            echo '<tr>
                    <td>'.$row['characterID'].'</td>
                    <td>'.$row['playerName'].'</td>
                    <td>'.$row['characterName'].'</td>
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
                </tr>';
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