<?php

session_start();

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

header("Location: https://itcapstone.djvalley.com/createGroup.php");