<?php

  if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != true) {
    $error = urlencode("Error loading page, invalid access");
    header("Location: login.php?error=$error");
  }

