<?php

session_start();
require 'authenticate.php'; // Uncomment Page will authenticate whether user is logged in
$windowTitle = "D&D Character Info - groupUpdate"; // Window title for each page, used inside header.php include.
$pageTitle = "groupUpdate"; // Page title goes here, used inside the nav.php include.

require 'resources/tools.php';

//Input Sanitization

// CharacterID
$groupName = sanitizeString(INPUT_POST, 'groupName');




try {

    $pdo->beginTransaction();


    $groupQuery = "UPDATE groups SET groupName=?
                     WHERE groupName = $groupName";



    $stmt = $pdo->prepare($groupQuery);
    $stmt->execute([$groupQuery]);

    $pdo->commit();

} catch (PDOException $e) {

    $pdo->rollBack();
    echo "Failed: " . $e->getMessage();

}

header("Location: http://localhost/createGroup.php");