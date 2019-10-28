<?php
?>
<h1><?= $pageTitle ?></h1>
<div class="navbar">
  <a href="index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn"><a href="characters.php">Characters <i class="fa fa-caret-down"></i></a>
    </button>
    <div class="dropdown-content">
      <a href="myCharacters.php">My Characters</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn"><a href="groups.php">Groups <i class="fa fa-caret-down"></i></a>
    </button>
    <div class="dropdown-content">
      <a href="myGroups.php">My Groups</a>
    </div>
  </div>
  <?php
    if ($_SESSION['authenticated'] == true) {
      echo '<a href="login.php?logout=1">Logout</a>';
    } else {
      echo '<a href="login.php">Login</a>';
    }
  ?>

</div>