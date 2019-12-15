<?php
?>
<h1>D&D Character Info Sheet</h1>
<div class="navbar">
  <a href="/index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn"><a href="/characters.php">Characters <i class="fa fa-caret-down"></i></a>
    </button>
    <div class="dropdown-content">
      <?php
        if (isset($_SESSION['authenticated'])) {
          $query = "SELECT characterID, characterName FROM characters
                WHERE userID = $_SESSION[userID]";
          $characters = $pdo->query($query);

          foreach ($characters as $character) {
            echo "<a href='/characters.php?charID=$character[characterID]'>$character[characterName]</a>";
          }
        } else {
          echo "<a href='/login.php'>Login to View</a>";
        }
      ?>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn"><a href="/groups.php">Groups <i class="fa fa-caret-down"></i></a>
    </button>
    <div class="dropdown-content">
        <?php
        if (isset($_SESSION['authenticated'])) {
            $query = "SELECT groupID, groupName FROM characters LEFT JOIN groups USING (groupID)
                WHERE userID = $_SESSION[userID]";
            $groups = $pdo->query($query);
                echo "<a href='createGroup.php'>Create Group</a>";
            foreach ($groups as $group) {
                echo "<a href='/groups.php?groupID=$group[groupID]'>$group[groupName]</a>";
            }
        } else {
            echo "<a href='/login.php'>Login to View</a>";
        }
        ?>
    </div>
  </div>
  <?php
    if (isset($_SESSION['authenticated'])) {
      echo '<a href="/login.php?logout=1">Logout</a>';
    } else {
      echo '<a href="/login.php">Login</a>';
    }
  ?>

</div>