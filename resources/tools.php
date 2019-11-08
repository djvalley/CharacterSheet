<?php

  function sanitizeString($type, $field) {
    return filter_input($type, $field, FILTER_SANITIZE_STRING);
  }

  function sanitizeEmail($type, $field){
    return filter_input($type, $field, FILTER_SANITIZE_EMAIL);
  }


  try {

    // Create new Database conenction
    $pdo = new PDO('mysql:host=itcapstone.djvalley.com:3306;dbname=CharacterInfoSheet', 'itcapstone', 'itcapstone');
    // Set Attributes and Encoding
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

  } catch (PDOException $ex) {

    $error = "Unable to connect to the database server<br><br>" . $ex->getMessage();

    throw $ex;

  }


